## Data to XML or HTML Generator
This is a simple utility for generating XML or HTML files for each record in a DB Table (MySQL).

---

### Modes (output)

Mode Switch in "index.php" file.

	$mode = 'HTML';
	OR
	$mode = 'XML';

Generate XML files

	Output to $xmlFolderLocation
	e.g. '../xmlexport/' - will expect a folder named "xmlexport" at the same level as this project on the server.

Generate HTML files

	Output to $htmllFolderLocation
	e.g. '../htmlexport/' - will expect a folder named "htmlexport" at the same level as this project on the server.
	
### Database (input)

Creating an instance of the Database class sets up all the parameters at once.

	$databaseToArray = new DataBase( host , username, password, database_name, table_name, record_count);
	e.g. $databaseToArray = new DataBase('localhost', 'root', 'root', 'musicbrainz', 'mb_releases', 10000);

### Suggestions

Since this is a file generation project note the following:

- Do not deploy it to a production server environment.
- Turn your browser cache OFF.
- Clear Browser cache.
- Do not use "Back" to navigate - rather get to the different folders from http://localhost.


### License

MIT: http://mit-license.org

Please FORK and submit improvements :-)
