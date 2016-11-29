<?php


class PDFCrowdConverter extends Object
{
    private static $third_party_file = "pdfcrowd/thirdparty/pdfcrowd.php";

    private static $username = "";

    private static $api_key = "";

    private static $singleton = null;

    private static $save_pdfs_here = 'pdfs'; //e.g. assets/pdfs

    public $pdf = null;

    /**
     * Allows access to the cart from anywhere in code.
     *@return ShoppingCart Object
     */
    public static function singleton()
    {
        if (!self::$singleton) {
            self::$singleton = new PDFCrowdConverter();
        }
        return self::$singleton;
    }

    public function __construct()
    {
        require_once(Director::baseFolder() . '/' .self::$third_party_file);
        $this->pdf = new Pdfcrowd(self::$username, self::$api_key);
        parent::__construct();
    }

    public function ConvertPage($page)
    {
        return $this->ConvertURL(Director::AbsoluteURL($page->Link), $page->URLSegment.".pdf", true);
    }

    //CACHING DOES NOT WORK!
    public function ConvertURL($url, $filename, $useCacheIfAvailable = false)
    {
        $folderFilename = '';
        if (isset($_GET["flush"])) {
            $useCacheIfAvailable = false;
        }
        $folderFilename = $this->file2FolderFilename($filename);
        if ($folderFilename && $useCacheIfAvailable) {
            if (file_exists($folderFilename)) {
                $url = Director::absoluteBaseURL().$this->file2FolderFilename($filename, true);
                header("Location: $url");
                exit();
            }
        }
        try {
            $pdf = $this->pdf->convertURI($url);
        } catch (PdfcrowdException $e) {
            return "Pdfcrowd Error: " . $e->getMessage();
        }
        if ($folderFilename = $this->file2FolderFilename($filename)) {
            if (!$pdf) {
                $pdf = "error occured";
            }
            $this->removeCachedPDF($filename);
            $fh = fopen($folderFilename, 'w');
            fwrite($fh, $pdf);
            fclose($fh);
        }
        return $this->outputPDF($pdf, $filename);
    }

    public function removeCachedPDF($filename)
    {
        if ($folderFilename = $this->file2FolderFilename($filename)) {
            if (file_exists($folderFilename)) {
                unlink($folderFilename);
            }
        }
    }

    protected function file2FolderFilename($filename, $withoutBase = false)
    {
        if (self::$save_pdfs_here) {
            $folder = Director::baseFolder()."/".self::$save_pdfs_here."/";
            $folderObject = Folder::find_or_make($folder);
            if ($withoutBase) {
                $folderFilename = $folderObject->getRelativePath() . $filename;
            } else {
                $folderFilename = $folderObject->getFullPath() . $filename;
            }
            return $folderFilename;
        }
    }


    public static function outputPDF($pdfAsString, $filename)
    {
        // set HTTP response headers
        header("Content-Type: application/pdf");
        header("Cache-Control: no-cache");
        header("Accept-Ranges: none");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        // send the generated PDF
        echo $pdfAsString;
    }
}
