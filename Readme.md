## Data to XML or HTML Generator
This is a simple utility for generating XML or HTML files for each record in a DB Table (MySQL).

---

### Modes

Mode Switch in "index.php" file.

	$mode = 'HTML';
	OR
	$mode = 'XML';

Generate XML files

	Output to $xmlFolderLocation
	example: '../xmlexport/' - will expect a folder named "xmlexport" at the same level as this project on the server.

Generate HTML files

	Output to $htmllFolderLocation
	example: '../htmlexport/' - will expect a folder named "htmlexport" at the same level as this project on the server.

### Suggestions

Since this is a file generation project note the following:

- Do not deploy it to a production server environment.
- Turn your browser cache OFF.
- Clear Browser cache.
- Do not use "Back" to navigate - rather get to the different folders from http://localhost.


### License

MIT: http://mit-license.org

Please FORK and submit improvements :-)
