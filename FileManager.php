<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/01
 * Time: 3:14 PM
 * To change this template use File | Settings | File Templates.
 */
class FileManager
{

    private $recordsArray = array();
    private $filesArray = array();
    private $tableName = 'tablename';

    function __construct($recordsArray, $tablename)
    {
        $this->recordsArray = $recordsArray;
        $this->tableName = $tablename;
    }

    public function exportToXMLFiles($recordsArray)
    {

        foreach($this->recordsArray as $record)
        {
            $buffer = '';
            $crlf = "\n";
            $buffer         = '<?xml version="1.0" encoding="utf-8"?>' . $crlf;

            $buffer        .= '   <table name="' . htmlspecialchars($this->tableName) . '">' . $crlf;

            foreach($record as $key=>$value){

                $buffer .= '      <column name="' . $key . '">' . htmlspecialchars((string)$value) . '</column>' . $crlf;
            }

            $buffer        .= '   </table>' . $crlf;

            date_default_timezone_set("UTC");
            //$filename = 'export/'.$record['id'].'-' . date('Y-m-d-H-i-s', time()) . '.xml';
            $filename = ($record['id'] . '.xml');
            $fp = fopen('../xmlexport/'.$filename, 'w');

            fwrite($fp, $buffer);

            $this->filesArray [] = $filename;

            fclose($fp);
        }

    }

    public function exportToHTMLFiles($recordsArray)
    {

        $previousRecord = "#";

        foreach($this->recordsArray as $record)
        {
            $buffer = '';
            $crlf = "\n";

            $buffer = '<!DOCTYPE html>' . $crlf;
            $buffer .= '<html lang="en">' . $crlf;
            $buffer .= '<head>' . $crlf;
            $buffer .= '<meta charset="utf-8">' . $crlf;

            $buffer .= '<title>' . $record['id'] . '</title>' . $crlf;
            $buffer .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . $crlf;
            $buffer .= '<meta name="description" content="">' . $crlf;
            $buffer .= '<meta name="author" content="">' . $crlf;

            $buffer .= '<link href="../assets/css/bootstrap.css" rel="stylesheet">' . $crlf;
            $buffer .= '<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">' . $crlf;
            $buffer .= '<link href="../assets/css/docs.css" rel="stylesheet">' . $crlf;
            $buffer .= '<link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">' . $crlf;

            $buffer .= '<!--[if lt IE 9]>' . $crlf;
            $buffer .= '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>' . $crlf;
            $buffer .= '<![endif]-->' . $crlf;

            $buffer .= '<link rel="shortcut icon" href="assets/ico/favicon.ico">' . $crlf;
            $buffer .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">' . $crlf;
            $buffer .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">' . $crlf;
            $buffer .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">' . $crlf;
            $buffer .= '<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">' . $crlf;

            $buffer .= '</head>' . $crlf;

            $buffer .= '<body>' . $crlf;

            $buffer .= '<div class="navbar navbar-inverse navbar-fixed-top">' . $crlf;
            $buffer .= '<div class="navbar-inner">' . $crlf;
            $buffer .= '<div class="container">' . $crlf;

            $buffer .= '<a class="brand" href="#">Muzikbrains</a>' . $crlf;

            $buffer .= '</div>' . $crlf;
            $buffer .= '</div>' . $crlf;
            $buffer .= '</div>' . $crlf;

            $buffer .= '<div class="container">' . $crlf;
            $buffer .= '<div class="row">' . $crlf;
            $buffer .= '<div class="span9">' . $crlf;
            $buffer .= '<section id="main">' . $crlf;
            $buffer .= '<div class="page-header">' . $crlf;
            $buffer .= '<h1>'. htmlspecialchars((string)$record['id']) .'</h1>' . $crlf;
            $buffer .= '</div>' . $crlf;

            $buffer         .= '        <table class="table table-bordered" id="' . htmlspecialchars($table) . '">' . $crlf;

            $buffer .= '<thead>' . $crlf;
            $buffer .= '<tr>' . $crlf;
            $buffer .= '<th>'.'Key'.'</th>' . $crlf;
            $buffer .= '<th>'.'Value'.'</th>' . $crlf;
            $buffer .= '</tr>' . $crlf;
            $buffer .= '</thead>' . $crlf;

            foreach($record as $key=>$value){

                $buffer .= '<tbody>' . $crlf;

                $buffer .= '<td>' . htmlspecialchars((string)$key) . '</td>' . $crlf;
                $buffer .= '<td>' . htmlspecialchars((string)$value) . '</td>' . $crlf;

                $buffer .= '</tbody>' . $crlf;
            }

            $buffer .= '</table>' . $crlf;

            $buffer .= '</section>' . $crlf;

            $buffer .= '<a href="./' . $previousRecord .'.html' . '" class="btn">Next</a>' . $crlf;

            $buffer .= '</div>' . $crlf;
            $buffer .= '</div>' . $crlf;
            $buffer .= '</div>' . $crlf;

            $buffer .= '<footer class="footer">' . $crlf;
            $buffer .= '<div class="container">' . $crlf;
            $buffer .= '<p class="pull-right"><a href="#">Back to top</a></p>' . $crlf;
            $buffer .= '<p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>' . $crlf;
            $buffer .= '</div>' . $crlf;
            $buffer .= '</footer>' . $crlf;

            $buffer .= '</body>' . $crlf;
            $buffer .= '</html>' . $crlf;

            $previousRecord = $record['id'];

            date_default_timezone_set("UTC");
            //$filename = 'export/'.$record['id'].'-' . date('Y-m-d-H-i-s', time()) . '.xml';
            $filename = ($record['id'] . '.html');
            $fp = fopen('../htmlexport/'.$filename, 'w');

            fwrite($fp, $buffer);

            $this->filesArray [] = $filename;

            fclose($fp);
        }

    }


    public function getFilesList()
    {
        return $this->filesArray;
    }

    public function getRecordsArray()
    {
        return $this->recordsArray;
    }

}