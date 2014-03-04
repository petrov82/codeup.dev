<html>
	<head>
		<title>JSON Objects for JS</title>
	</head>
	<body>
		<p>
			<script type="text/javascript">


				var books = [
					{
						bookTitle:"Ivanhoe",
						bookAuthor: {
							firstName:"Walter", 
							lastName:"Scott", 
							dateMort:1832
							},
						bookPub:1820
					},
					
					{
						bookTitle:"Princess from Mars",
						bookAuthor: {
							firstName:"E.R.",
							lastName:"Burroughs",
							dateMort:1950
							},
						bookPub:1917

					},

					{
						bookTitle:"At the Back of the North Wind", 
						bookAuthor: {
							"firstName":"George",
							"lastName":"MacDonald",
							"dateMort":1905
							},
						bookPub:1871

					},

					{
						bookTitle:"Mother Goose in Prose",
						bookAuthor: {
							"firstName":"L. Frank",
							"lastName":"Baum",
							"dateMort":1919
							},
						bookPub:1897
					},

					{
						bookTitle:"The Happy Prince and Other Tales",
						bookAuthor: {
							"firstName":"Oscar",
							"lastName":"Wilde",
							"dateMort":1900
							},
						bookPub:1888
					}
				];

// log out the books array
console.log(books);

books.forEach(function(element, index, array){
	document.write("Book #" + (index + 1));
	document.write("Title: " + element.bookTitle);
	document.write("Author: " + element.bookAuthor.firstName + " " + element.bookAuthor.lastName + ", d. " + element.bookAuthor.dateMort);
	document.write("Year Published: " + element.bookPub)
	document.write("---");
});
/* Loop through the array of books using .forEach and print out the specified information about each one.
// start loop here
    
// end loop here
*/
			</script>
		</p>
	</body>
</html>
