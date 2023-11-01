<?php

namespace Config;

use Dompdf\Dompdf;

/**
 * -------------------------------------------------------------------
 * Dompdf Configuration
 * -------------------------------------------------------------------
 * This file will contain the settings needed to use Dompdf.
 *
 * For complete instructions on using Dompdf, please see the documentation
 * at https://github.com/dompdf/dompdf.
 */

/**
 *-------------------------------------------------------------------
 * PHP executable
 *-------------------------------------------------------------------
 * Path to the PHP executable.
 * If empty, the executable is the PHP binary in your system's PATH.
 */
$phpExecutable = 'php'; // You can specify the path to PHP if needed.

/**
 *-------------------------------------------------------------------
 * File encoding
 *-------------------------------------------------------------------
 * File encoding for PDF.
 * For proper character encoding in PDF, you can specify the file encoding here.
 */
$fileEncoding = 'utf-8';

/**
 *-------------------------------------------------------------------
 * Paper size
 *-------------------------------------------------------------------
 * Paper size for PDF.
 * You can specify the default paper size for generated PDFs.
 * Options: 'letter', 'legal', 'A4', etc.
 */
$defaultPaperSize = 'A4';

/**
 *-------------------------------------------------------------------
 * DPI setting
 *-------------------------------------------------------------------
 * DPI (Dots Per Inch) setting.
 * The default DPI setting for images in PDF.
 * Increasing the DPI will improve image quality but increase file size.
 */
$imageDpi = 96;

/**
 *-------------------------------------------------------------------
 * Enable font subsetting
 *-------------------------------------------------------------------
 * Enable font subsetting to reduce the file size of the resulting PDF.
 * This is useful for font licenses that restrict font distribution.
 */
$enableFontSubsetting = true;

/**
 *-------------------------------------------------------------------
 * Temp directory
 *-------------------------------------------------------------------
 * A temporary directory where Dompdf can write temporary files.
 * You should make sure this directory is writable.
 */
$tempDir = WRITEPATH . 'dompdf';

/**
 *-------------------------------------------------------------------
 * Enable PDF/A mode
 *-------------------------------------------------------------------
 * Enable PDF/A mode to create PDF/A-2b compliant files.
 */
$pdfA = false;

/**
 *-------------------------------------------------------------------
 * PDF/A compliance mode
 *-------------------------------------------------------------------
 * PDF/A compliance mode.
 * Possible values: '1b', '2b', '2u', '3b', '3u'.
 * If $pdfA is set to true, you can choose the PDF/A compliance mode.
 */
$pdfA_compliance = '1b';

/**
 *-------------------------------------------------------------------
 * PDF/X mode
 *-------------------------------------------------------------------
 * Enable PDF/X mode to create PDF/X-1a compliant files.
 */
$pdfX = false;

/**
 *-------------------------------------------------------------------
 * Font directory
 *-------------------------------------------------------------------
 * Font directory for custom fonts.
 * You can specify a directory where you keep custom TTF font files.
 */
$fontDir = APPPATH . 'Fonts/';

/**
 *-------------------------------------------------------------------
 * Font cache directory
 *-------------------------------------------------------------------
 * Font cache directory for custom fonts.
 * You can specify a directory to store font caches.
 */
$fontCache = WRITEPATH . 'dompdf_font_cache';

/**
 *-------------------------------------------------------------------
 * Auto load the Dompdf library.
 *-------------------------------------------------------------------
 * You can auto load the Dompdf library in CodeIgniter.
 * To load the library, add 'Dompdf' to the 'classmap' in the 'config/Autoload.php' file.
 */
$autoload = ['Dompdf'];
