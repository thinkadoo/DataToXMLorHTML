<?php require_once 'header.php';?>

<?php require_once 'Database.php'; require_once 'FileManager.php';

    $mode = 'HTML';

    $xmlFolderLocation = '../xmlexport/';
    $htmllFolderLocation = '../htmlexport/';
    // NB copy the "assets" folder to ../ in order for htmlexport files to find the css and js

    $databaseToArray = new DataBase('localhost', 'root', 'root', 'musicbrainz', 'mb_releases', 10000);
    $resultArray = $databaseToArray->getArray();

    $fileExporter = new FileManager($resultArray, 'Releases');
    $result = $fileExporter->getRecordsArray();

    if ($mode == 'XML')
    {
        $fileExporter->exportToXMLFiles($resultArray);

        $filesCreatedList = $fileExporter->getFilesList();
        echo '<br>';
        foreach ($filesCreatedList as $filename)
        {
            echo '<p><a href="' . $xmlFolderLocation . $filename . '">' . $filename.'</a></p>' ;
        }
    }

    if ($mode == 'HTML')
    {
        $fileExporter->exportToHTMLFiles($resultArray);

        $filesCreatedList = $fileExporter->getFilesList();
        echo '<br>';
        foreach ($filesCreatedList as $filename)
        {
            echo '<p><a href="'. $htmllFolderLocation . $filename . '">' . $filename.'</a></p>' ;
        }
    }

?>

<?php require_once 'footer.php';?>