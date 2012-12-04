###############################################
PDFCrowdConverter
Proof of concept
###############################################

Developer
-----------------------------------------------
Nicolaas Francken [at] sunnysideup.co.nz

Requirements
-----------------------------------------------
SilverStripe 2.4+

Documentation
-----------------------------------------------
see http://pdfcrowd.com/ for more details


Installation Instructions
-----------------------------------------------
1. Find out how to add modules to SS and add module as per usual.

2. Copy configurations from this module's _config.php file
into mysite/_config.php file and edit settings as required.
NB. the idea is not to edit the module at all, but instead customise
it from your mysite folder, so that you can upgrade the module without redoing the settings.

Sample code
-----------------------------------------------
see http://pdfcrowd.com/ for more details
//$this->pdf->setPageWidth("10mm"); //Sets PDF page width in units.
//$this->pdf->setPageHeight($value); //Sets PDF page height in units. Use -1 for a single page PDF.
//$this->pdf->setHorizontalMargin($value); //Sets PDF page horizontal margin in units.
//$this->pdf->setVerticalMargin($value); //Sets PDF vertical page margin in units.
//$this->pdf->setEncrypted($val); //Set val to True to encrypt the PDF. This prevents search engines from indexing the document. The default is False.
//$this->pdf->setUserPassword($pwd); //Protect the PDF with a user password. When a PDF has a user password, it must be supplied in order to view the document and to perform operations allowed by the access permissions. At most 32 characters.
//$this->pdf->setOwnerPassword($pwd); //Protect the PDF with an owner password. Supplying an owner password grants unlimited access to the PDF including changing the passwords and access permissions. At most 32 characters.
//$this->pdf->setNoPrint($val); //Set val to True to disable printing the PDF. The default is False.
//$this->pdf->setNoModify($val); //Set val to True to disable modifying the PDF. The default is False.
//$this->pdf->setNoCopy($val); //Set val to True to disable extracting text and graphics from the PDF. The default is False.
//$this->pdf->setPageLayout($value); //Sets the initial page layout when the PDF is opened in a viewer. SINGLE_PAGE 
//CONTINUOUS
//CONTINUOUS_FACING
//$this->pdf->setPageMode($value); //Specifies the appearance of the PDF when opened.
//FULLSCREEN - Full-screen mode.
//$this->pdf->setFooterText($value); //Place plain text inside the page footer. The following variables are expanded:
//%u - Source URL.
//%p - The current page number.
//%n - Total number of pages.
//$this->pdf->setFooterHtml($value); //Place the specified HTML code inside the page footer. See setFooterText for the list of variables that are expanded.
//$this->pdf->setFooterUrl($value); //Load HTML code from the specified URL and place it inside the page footer. See setFooterText for the list of variables that are expanded.
//$this->pdf->setHeaderHtml($value); //Place the specified HTML code inside the page header. See setFooterText for the list of variables that are expanded.
//$this->pdf->setHeaderUrl($value); //Load HTML code from the specified URL and place it inside the page header. See setFooterText for the list of variables that are expanded.
//$this->pdf->enableImages($value); //Set value to False to disable printing images to the PDF. The default is True
//$this->pdf->enableBackgrounds($value); //Set value to False to disable printing backgrounds to the PDF. The default is True
//$this->pdf->setHtmlZoom($value); //Set HTML zoom in percents. It determines the precision used for rendering of the HTML content. Despite its name, it does not zoom the HTML content. Higher values can improve glyph positioning and can lead to overall better visual appearance of generated PDF .The default value is 200.
//$this->pdf->enableJavaScript($value); //Set value to False to disable JavaScript in web pages. The default is True.
//$this->pdf->enableHyperlinks($value); //Set value to False to disable hyperlinks in the PDF. The default is True.
//$this->pdf->setDefaultTextEncoding($value); //value is the text encoding used when none is specified in a web page. The default is utf-8.
//$this->pdf->usePrintMedia($value = true); //If value is True then the print CSS media type is used (if available).
//$this->pdf->setMaxPages($npages); //Prints at most npages pages.
//$this->pdf->enablePdfcrowdLogo($value); //Inserts the Pdfcrowd logo to the footer if value is set to True. The default is False.
//$this->pdf->setInitialPdfZoomType($value); //value specifies the appearance of the PDF when opened.
//FIT_WIDTH
//FIT_HEIGHT
//FIT_PAGE
//$this->pdf->setInitialPdfExactZoom($value); //value specifies the initial page zoom of the PDF when opened.
//$this->pdf->setPdfScalingFactor($value); //The scaling factor used to convert between HTML and PDF. The default value is 1.0.
//$this->pdf->setPageBackgroundColor($value); //The page background color in RRGGBB hexadecimal format.
//$this->pdf->setAuthor($value); //Sets the author field in the created PDF.
//$this->pdf->setFailOnNon200($value); //If value is True then the conversion will fail when the source URI returns 4xx or 5xx HTTP status code. The default is False.


###############################################

