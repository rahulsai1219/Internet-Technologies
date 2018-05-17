
SQL, 'Structured Query Language', is a programming language designed to manage data stored in relational databases. SQL operates through simple, declarative statements. This keeps data accurate and secure, and helps maintain the integrity of databases, regardless of size.

Here's an appendix of commonly used commands.

COMMANDS
ALTER TABLE
ALTER TABLE table_name ADD column datatype;

ALTER TABLE lets you add columns to a table in a database.

AND
SELECT column_name(s)
FROM table_name
WHERE column_1 = value_1
AND column_2 = value_2;

AND is an operator that combines two conditions. Both conditions must be true for the row to be included in the result set.

AS
SELECT column_name AS 'Alias'
FROM table_name;

AS is a keyword in SQL that allows you to rename a column or table using an alias.

AVG
SELECT AVG(column_name)
FROM table_name;

AVG() is an aggregate function that returns the average value for a numeric column.

BETWEEN
SELECT column_name(s)
FROM table_name
WHERE column_name BETWEEN value_1 AND value_2;

The BETWEEN operator is used to filter the result set within a certain range. The values can be numbers, text or dates.

COUNT
SELECT COUNT(column_name)
FROM table_name;

COUNT() is a function that takes the name of a column as an argument and counts the number of rows where the column is not NULL.

CREATE TABLE
CREATE TABLE table_name (column_1 datatype, column_2 datatype, column_3 datatype);

CREATE TABLE creates a new table in the database. It allows you to specify the name of the table and the name of each column in the table.

DELETE
DELETE FROM table_name WHERE some_column = some_value;

DELETE statements are used to remove rows from a table.

GROUP BY
SELECT COUNT(*)
FROM table_name
GROUP BY column_name;

GROUP BY is a clause in SQL that is only used with aggregate functions. It is used in collaboration with the SELECT statement to arrange identical data into groups.

INNER JOIN
SELECT column_name(s) FROM table_1
JOIN table_2
ON table_1.column_name = table_2.column_name;

An inner join will combine rows from different tables if the join condition is true.

INSERT
INSERT INTO table_name (column_1, column_2, column_3) VALUES (value_1, 'value_2', value_3);

INSERT statements are used to add a new row to a table.

LIKE
SELECT column_name(s)
FROM table_name
WHERE column_name LIKE pattern;

LIKE is a special operator used with the WHERE clause to search for a specific pattern in a column.

LIMIT
SELECT column_name(s)
FROM table_name
LIMIT number;

LIMIT is a clause that lets you specify the maximum number of rows the result set will have.

MAX
SELECT MAX(column_name)
FROM table_name;

MAX() is a function that takes the name of a column as an argument and returns the largest value in that column.

MIN
SELECT MIN(column_name)
FROM table_name;

MIN() is a function that takes the name of a column as an argument and returns the smallest value in that column.

OR
SELECT column_name
FROM table_name
WHERE column_name = value_1
OR column_name = value_2;

OR is an operator that filters the result set to only include rows where either condition is true.

ORDER BY
SELECT column_name
FROM table_name
ORDER BY column_name ASC|DESC;

ORDER BY is a clause that indicates you want to sort the result set by a particular column either alphabetically or numerically.

OUTER JOIN
SELECT column_name(s) FROM table_1
LEFT JOIN table_2
ON table_1.column_name = table_2.column_name;

An outer join will combine rows from different tables even if the the join condition is not met. Every row in the left table is returned in the result set, and if the join condition is not met, then NULL values are used to fill in the columns from the right table.

ROUND
SELECT ROUND(column_name, integer)
FROM table_name;

ROUND() is a function that takes a column name and an integer as an argument. It rounds the values in the column to the number of decimal places specified by the integer.

SELECT
SELECT column_name FROM table_name;

SELECT statements are used to fetch data from a database. Every query will begin with SELECT.

SELECT DISTINCT
SELECT DISTINCT column_name FROM table_name;

SELECT DISTINCT specifies that the statement is going to be a query that returns unique values in the specified column(s).

SUM
SELECT SUM(column_name)
FROM table_name;

SUM() is a function that takes the name of a column as an argument and returns the sum of all the values in that column.

UPDATE
UPDATE table_name
SET some_column = some_value
WHERE some_column = some_value;

UPDATE statements allow you to edit rows in a table.

WHERE
SELECT column_name(s)
FROM table_name
WHERE column_name operator value;

WHERE is a clause that indicates you want to filter the result set to include only rows where the following condition is true.





XML


XML Documents Must Have a Root Element
XML documents must contain one root element that is the parent of all other elements:

<root>
  <child>
    <subchild>.....</subchild>
  </child>
</root>
In this example <note> is the root element:

<?xml version="1.0" encoding="UTF-8"?>
<note>
  <to>Tove</to>
  <from>Jani</from>
  <heading>Reminder</heading>
  <body>Don't forget me this weekend!</body>
</note>
The XML Prolog
This line is called the XML prolog:

<?xml version="1.0" encoding="UTF-8"?>
The XML prolog is optional. If it exists, it must come first in the document.

XML documents can contain international characters, like Norwegian øæå or French êèé.

To avoid errors, you should specify the encoding used, or save your XML files as UTF-8.

UTF-8 is the default character encoding for XML documents.

Character encoding can be studied in our Character Set Tutorial.


All XML Elements Must Have a Closing Tag
In XML, it is illegal to omit the closing tag. All elements must have a closing tag:

<p>This is a paragraph.</p>
<br />
Note: The XML prolog does not have a closing tag! This is not an error. The prolog is not a part of the XML document.

XML Tags are Case Sensitive
XML tags are case sensitive. The tag <Letter> is different from the tag <letter>.

Opening and closing tags must be written with the same case:

<message>This is correct</message>
"Opening and closing tags" are often referred to as "Start and end tags". Use whatever you prefer. It is exactly the same thing.

XML Elements Must be Properly Nested
In HTML, you might see improperly nested elements:

<b><i>This text is bold and italic</b></i>
In XML, all elements must be properly nested within each other:

<b><i>This text is bold and italic</i></b>
In the example above, "Properly nested" simply means that since the <i> element is opened inside the <b> element, it must be closed inside the <b> element.

XML Attribute Values Must Always be Quoted
XML elements can have attributes in name/value pairs just like in HTML.

In XML, the attribute values must always be quoted:

<note date="12/11/2007">
  <to>Tove</to>
  <from>Jani</from>
</note>
Entity References
Some characters have a special meaning in XML.

If you place a character like "<" inside an XML element, it will generate an error because the parser interprets it as the start of a new element.

This will generate an XML error:

<message>salary < 1000</message>
To avoid this error, replace the "<" character with an entity reference:

<message>salary &lt; 1000</message>
There are 5 pre-defined entity references in XML:

&lt;	<	less than
&gt;	>	greater than
&amp;	&	ampersand
&apos;	'	apostrophe
&quot;	"	quotation mark
Only < and & are strictly illegal in XML, but it is a good habit to replace > with &gt; as well.

Comments in XML
The syntax for writing comments in XML is similar to that of HTML:

<!-- This is a comment -->
Two dashes in the middle of a comment are not allowed:

<!-- This is an invalid -- comment -->
White-space is Preserved in XML
XML does not truncate multiple white-spaces (HTML truncates multiple white-spaces to one single white-space):

XML:	Hello           Tove
HTML:	Hello Tove
XML Stores New Line as LF
Windows applications store a new line as: carriage return and line feed (CR+LF).

Unix and Mac OSX uses LF.

Old Mac systems uses CR.

XML stores a new line as LF.

Well Formed XML
XML documents that conform to the syntax rules above are said to be "Well Formed" XML documents.

An XML document contains XML Elements.

What is an XML Element?
An XML element is everything from (including) the element's start tag to (including) the element's end tag.

<price>29.99</price>
An element can contain:

text
attributes
other elements
or a mix of the above
<bookstore>
  <book category="children">
    <title>Harry Potter</title>
    <author>J K. Rowling</author>
    <year>2005</year>
    <price>29.99</price>
  </book>
  <book category="web">
    <title>Learning XML</title>
    <author>Erik T. Ray</author>
    <year>2003</year>
    <price>39.95</price>
  </book>
</bookstore>
In the example above:

<title>, <author>, <year>, and <price> have text content because they contain text (like 29.99).

<bookstore> and <book> have element contents, because they contain elements.

<book> has an attribute (category="children").

Empty XML Elements
An element with no content is said to be empty.

In XML, you can indicate an empty element like this:

<element></element>
You can also use a so called self-closing tag:

<element />
The two forms produce identical results in XML software (Readers, Parsers, Browsers).

Empty elements can have attributes.

XML Naming Rules
XML elements must follow these naming rules:

Element names are case-sensitive
Element names must start with a letter or underscore
Element names cannot start with the letters xml (or XML, or Xml, etc)
Element names can contain letters, digits, hyphens, underscores, and periods
Element names cannot contain spaces
Any name can be used, no words are reserved (except xml).

Best Naming Practices
Create descriptive names, like this: <person>, <firstname>, <lastname>.

Create short and simple names, like this: <book_title> not like this: <the_title_of_the_book>.

Avoid "-". If you name something "first-name", some software may think you want to subtract "name" from "first".

Avoid ".". If you name something "first.name", some software may think that "name" is a property of the object "first".

Avoid ":". Colons are reserved for namespaces (more later).

Non-English letters like éòá are perfectly legal in XML, but watch out for problems if your software doesn't support them.

Naming Styles
There are no naming styles defined for XML elements. But here are some commonly used:

Style	Example	Description
Lower case	<firstname>	All letters lower case
Upper case	<FIRSTNAME>	All letters upper case
Underscore	<first_name>	Underscore separates words
Pascal case	<FirstName>	Uppercase first letter in each word
Camel case	<firstName>	Uppercase first letter in each word except the first
If you choose a naming style, it is good to be consistent!

XML documents often have a corresponding database. A common practice is to use the naming rules of the database for the XML elements.

Camel case is a common naming rule in JavaScripts.

XML Elements are Extensible
XML elements can be extended to carry more information.

Look at the following XML example:

<note>
  <to>Tove</to>
  <from>Jani</from>
  <body>Don't forget me this weekend!</body>
</note>
Let's imagine that we created an application that extracted the <to>, <from>, and <body> elements from the XML document to produce this output:

MESSAGE
To: Tove
From: Jani

Don't forget me this weekend!

Imagine that the author of the XML document added some extra information to it:

<note>
  <date>2008-01-10</date>
  <to>Tove</to>
  <from>Jani</from>
  <heading>Reminder</heading>
  <body>Don't forget me this weekend!</body>
</note>
Should the application break or crash?

No. The application should still be able to find the <to>, <from>, and <body> elements in the XML document and produce the same output.

This is one of the beauties of XML. It can be extended without breaking applications.

XML Attributes Must be Quoted
Attribute values must always be quoted. Either single or double quotes can be used.

For a person's gender, the <person> element can be written like this:

<person gender="female">
or like this:

<person gender='female'>
If the attribute value itself contains double quotes you can use single quotes, like in this example:

<gangster name='George "Shotgun" Ziegler'>
or you can use character entities:

<gangster name="George &quot;Shotgun&quot; Ziegler">
XML Elements vs. Attributes
Take a look at these examples:

<person gender="female">
  <firstname>Anna</firstname>
  <lastname>Smith</lastname>
</person>

<person>
  <gender>female</gender>
  <firstname>Anna</firstname>
  <lastname>Smith</lastname>
</person>
In the first example gender is an attribute. In the last, gender is an element. Both examples provide the same information.

There are no rules about when to use attributes or when to use elements in XML.
The XMLHttpRequest Object
The XMLHttpRequest object can be used to request data from a web server.

The XMLHttpRequest object is a developers dream, because you can:

Update a web page without reloading the page
Request data from a server - after the page has loaded
Receive data from a server  - after the page has loaded
Send data to a server - in the background
XMLHttpRequest Example
When you type a character in the input field below, an XMLHttpRequest is sent to the server, and some name suggestions are returned (from the server):

Example
Start typing a name in the input field below:

Name:
   Suggestions:

The example above is explained in the AJAX chapters of this tutorial.

Sending an XMLHttpRequest
A common JavaScript syntax for using the XMLHttpRequest object looks much like this:

Example
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       document.getElementById("demo").innerHTML = xhttp.responseText;
    }
};
xhttp.open("GET", "filename", true);
xhttp.send();


What is the DOM?
The DOM defines a standard for accessing and manipulating documents:

"The W3C Document Object Model (DOM) is a platform and language-neutral interface that allows programs and scripts to dynamically access and update the content, structure, and style of a document."

The HTML DOM defines a standard way for accessing and manipulating HTML documents. It presents an HTML document as a tree-structure.

The XML DOM defines a standard way for accessing and manipulating XML documents. It presents an XML document as a tree-structure.

Understanding the DOM is a must for anyone working with HTML or XML.

The HTML DOM
All HTML elements can be accessed through the HTML DOM.

This example changes the value of an HTML element with id="demo":

Example
<h1 id="demo">This is a Heading</h1>

<button type="button"
onclick="document.getElementById('demo').innerHTML = 'Hello World!'">Click Me!
</button>

The XML DOM
All XML elements can be accessed through the XML DOM.

Books.xml
<?xml version="1.0" encoding="UTF-8"?>
<bookstore>

  <book category="cooking">
    <title lang="en">Everyday Italian</title>
    <author>Giada De Laurentiis</author>
    <year>2005</year>
    <price>30.00</price>
  </book>

  <book category="children">
    <title lang="en">Harry Potter</title>
    <author>J K. Rowling</author>
    <year>2005</year>
    <price>29.99</price>
  </book>

</bookstore>
This code retrieves the text value of the first <title> element in an XML document:

Example
txt = xmlDoc.getElementsByTagName("title")[0].childNodes[0].nodeValue;
The XML DOM is a standard for how to get, change, add, and delete XML elements.

This example loads a text string into an XML DOM object, and extracts the info from it with JavaScript:

Example
<html>
<body>

<p id="demo"></p>

<script>
var text, parser, xmlDoc;

text = "<bookstore><book>" +
"<title>Everyday Italian</title>" +
"<author>Giada De Laurentiis</author>" +
"<year>2005</year>" +
"</book></bookstore>";

parser = new DOMParser();
xmlDoc = parser.parseFromString(text,"text/xml");

document.getElementById("demo").innerHTML =
xmlDoc.getElementsByTagName("title")[0].childNodes[0].nodeValue;
</script>

</body>
</html>

                                        ajax


  AJAX Example Explained
  HTML Page
  <!DOCTYPE html>
  <html>
  <body>

  <div id="demo">
    <h2>Let AJAX change this text</h2>
    <button type="button" onclick="loadDoc()">Change Content</button>
  </div>

  </body>
  </html>
  The HTML page contains a <div> section and a <button>.

  The <div> section is used to display information from a server.

  The <button> calls a function (if it is clicked).

  The function requests data from a web server and displays it:

  Function loadDoc()
  function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("demo").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "ajax_info.txt", true);
    xhttp.send();


    What is AJAX?
    AJAX = Asynchronous JavaScript And XML.

    AJAX is not a programming language.

    AJAX just uses a combination of:

    A browser built-in XMLHttpRequest object (to request data from a web server)
    JavaScript and HTML DOM (to display or use the data)
    AJAX is a misleading name. AJAX applications might use XML to transport data, but it is equally common to transport data as plain text or JSON text.

    AJAX allows web pages to be updated asynchronously by exchanging data with a web server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.

    1. An event occurs in a web page (the page is loaded, a button is clicked)
    2. An XMLHttpRequest object is created by JavaScript
    3. The XMLHttpRequest object sends a request to a web server
    4. The server processes the request
    5. The server sends a response back to the web page
    6. The response is read by JavaScript
    7. Proper action (like page update) is performed by JavaScript


    The keystone of AJAX is the XMLHttpRequest object.

The XMLHttpRequest Object
All modern browsers support the XMLHttpRequest object.

The XMLHttpRequest object can be used to exchange data with a server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.

Create an XMLHttpRequest Object
All modern browsers (Chrome, Firefox, IE7+, Edge, Safari Opera) have a built-in XMLHttpRequest object.

Syntax for creating an XMLHttpRequest object:

variable = new XMLHttpRequest();
Example
var xhttp = new XMLHttpRequest();
Access Across Domains
For security reasons, modern browsers do not allow access across domains.

This means that both the web page and the XML file it tries to load, must be located on the same server.

The examples on W3Schools all open XML files located on the W3Schools domain.

If you want to use the example above on one of your own web pages, the XML files you load must be located on your own server.

Old Versions of Internet Explorer (IE5 and IE6)
Old versions of Internet Explorer (IE5 and IE6) use an ActiveX object instead of the XMLHttpRequest object:

variable = new ActiveXObject("Microsoft.XMLHTTP");
To handle IE5 and IE6, check if the browser supports the XMLHttpRequest object, or else create an ActiveX object:

Example
if (window.XMLHttpRequest) {
    // code for modern browsers
    xmlhttp = new XMLHttpRequest();
 } else {
    // code for old IE browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}


XMLHttpRequest Object Methods
Method	Description
new XMLHttpRequest()	Creates a new XMLHttpRequest object
abort()	Cancels the current request
getAllResponseHeaders()	Returns header information
getResponseHeader()	Returns specific header information
open(method,url,async,user,psw)	Specifies the request

method: the request type GET or POST
url: the file location
async: true (asynchronous) or false (synchronous)
user: optional user name
psw: optional password
send()	Sends the request to the server
Used for GET requests
send(string)	Sends the request to the server.
Used for POST requests
setRequestHeader()	Adds a label/value pair to the header to be sent
XMLHttpRequest Object Properties
Property	Description
onreadystatechange	Defines a function to be called when the readyState property changes
readyState	Holds the status of the XMLHttpRequest.
0: request not initialized
1: server connection established
2: request received
3: processing request
4: request finished and response is ready
responseText	Returns the response data as a string
responseXML	Returns the response data as XML data
status	Returns the status-number of a request
200: "OK"
403: "Forbidden"
404: "Not Found"
For a complete list go to the Http Messages Reference
statusText	Returns the status-text (e.g. "OK" or "Not Found")


The XMLHttpRequest object is used to exchange data with a server.

Send a Request To a Server
To send a request to a server, we use the open() and send() methods of the XMLHttpRequest object:

xhttp.open("GET", "ajax_info.txt", true);
xhttp.send();
Method	Description
open(method, url, async)	Specifies the type of request

method: the type of request: GET or POST
url: the server (file) location
async: true (asynchronous) or false (synchronous)
send()	Sends the request to the server (used for GET)
send(string)	Sends the request to the server (used for POST)
GET or POST?
GET is simpler and faster than POST, and can be used in most cases.

However, always use POST requests when:

A cached file is not an option (update a file or database on the server).
Sending a large amount of data to the server (POST has no size limitations).
Sending user input (which can contain unknown characters), POST is more robust and secure than GET.

The onreadystatechange Property
The readyState property holds the status of the XMLHttpRequest.

The onreadystatechange property defines a function to be executed when the readyState changes.

The status property and the statusText property holds the status of the XMLHttpRequest object.

Property	Description
onreadystatechange	Defines a function to be called when the readyState property changes
readyState	Holds the status of the XMLHttpRequest.
0: request not initialized
1: server connection established
2: request received
3: processing request
4: request finished and response is ready
status	200: "OK"
403: "Forbidden"
404: "Page not found"
For a complete list go to the Http Messages Reference
statusText	Returns the status-text (e.g. "OK" or "Not Found")
The onreadystatechange function is called every time the readyState changes.

When readyState is 4 and status is 200, the response is ready:

Example
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML =
            this.responseText;
       }
    };
    xhttp.open("GET", "ajax_info.txt", true);
    xhttp.send();
}
Using a Callback Function
A callback function is a function passed as a parameter to another function.

If you have more than one AJAX task in a website, you should create one function for executing the XMLHttpRequest object, and one callback function for each AJAX task.

The function call should contain the URL and what function to call when the response is ready.

Example
loadDoc("url-1", myFunction1);

loadDoc("url-2", myFunction2);

function loadDoc(url, cFunction) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      cFunction(this);
    }
 };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function myFunction1(xhttp) {
  // action goes here
}
function myFunction2(xhttp) {
  // action goes here
}
Server Response Properties
Property	Description
responseText	get the response data as a string
responseXML	get the response data as XML data
Server Response Methods
Method	Description
getResponseHeader()	Returns specific header information from the server resource
getAllResponseHeaders()	Returns all the header information from the server resource
The responseText Property
The responseText property returns the server response as a JavaScript string, and you can use it accordingly:

Example
document.getElementById("demo").innerHTML = xhttp.responseText;
The responseXML Property
The XML HttpRequest object has an in-built XML parser.

The responseXML property returns the server response as an XML DOM object.

Using this property you can parse the response as an XML DOM.



JavaScript


JavaScript Can Change HTML Content
One of many JavaScript HTML methods is getElementById().

This example uses the method to "find" an HTML element (with id="demo") and changes the element content (innerHTML) to "Hello JavaScript":

Example
document.getElementById("demo").innerHTML = "Hello JavaScript";
JavaScript accepts both double and single quotes:

Example
document.getElementById('demo').innerHTML = 'Hello JavaScript';
JavaScript Can Change HTML Attribute Values
In this example JavaScript changes the value of the src (source) attribute of an <img> tag:



The <script> Tag
In HTML, JavaScript code must be inserted between <script> and </script> tags.

Example
<script>
document.getElementById("demo").innerHTML = "My First JavaScript";
</script>

Old JavaScript examples may use a type attribute: <script type="text/javascript">.
The type attribute is not required. JavaScript is the default scripting language in HTML.

JavaScript Functions and Events
A JavaScript function is a block of JavaScript code, that can be executed when "called" for.

For example, a function can be called when an event occurs, like when the user clicks a button.

You will learn much more about functions and events in later chapters.

JavaScript in <head> or <body>
You can place any number of scripts in an HTML document.

Scripts can be placed in the <body>, or in the <head> section of an HTML page, or in both.

JavaScript in <head>
In this example, a JavaScript function is placed in the <head> section of an HTML page.

The function is invoked (called) when a button is clicked:

Example
<!DOCTYPE html>
<html>
<head>
<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Paragraph changed.";
}
</script>
</head>

<body>

<h1>A Web Page</h1>
<p id="demo">A Paragraph</p>
<button type="button" onclick="myFunction()">Try it</button>

</body>
</html>


JavaScript in <body>
In this example, a JavaScript function is placed in the <body> section of an HTML page.

The function is invoked (called) when a button is clicked:

Example
<!DOCTYPE html>
<html>
<body>

<h1>A Web Page</h1>
<p id="demo">A Paragraph</p>
<button type="button" onclick="myFunction()">Try it</button>

<script>
function myFunction() {
   document.getElementById("demo").innerHTML = "Paragraph changed.";
}
</script>

</body>
</html>
Placing scripts at the bottom of the <body> element improves the display speed, because script compilation slows down the display.

External JavaScript
Scripts can also be placed in external files:

External file: myScript.js
function myFunction() {
   document.getElementById("demo").innerHTML = "Paragraph changed.";
}
External scripts are practical when the same code is used in many different web pages.

JavaScript files have the file extension .js.

To use an external script, put the name of the script file in the src (source) attribute of a <script> tag:

Example
<script src="myScript.js"></script>
You can place an external script reference in <head> or <body> as you like.

The script will behave as if it was located exactly where the <script> tag is located.

External scripts cannot contain <script> tags.

External JavaScript Advantages
Placing scripts in external files has some advantages:

It separates HTML and code
It makes HTML and JavaScript easier to read and maintain
Cached JavaScript files can speed up page loads
To add several script files to one page  - use several script tags:

Example
<script src="myScript1.js"></script>
<script src="myScript2.js"></script>
External References
External scripts can be referenced with a full URL or with a path relative to the current web page.

This example uses a full URL to link to a script:

Example
<script src="https://www.w3schools.com/js/myScript1.js"></script>

This example uses a script located in a specified folder on the current web site:

Example
<script src="/js/myScript1.js"></script>

This example links to a script located in the same folder as the current page:

Example
<script src="myScript1.js"></script>

You can read more about file paths in the chapter HTML File Paths.


JavaScript Display Possibilities
JavaScript can "display" data in different ways:

Writing into an HTML element, using innerHTML.
Writing into the HTML output using document.write().
Writing into an alert box, using window.alert().
Writing into the browser console, using console.log().
Using innerHTML
To access an HTML element, JavaScript can use the document.getElementById(id) method.

The id attribute defines the HTML element. The innerHTML property defines the HTML content:

Example
<!DOCTYPE html>
<html>
<body>

<h1>My First Web Page</h1>
<p>My First Paragraph</p>

<p id="demo"></p>

<script>
document.getElementById("demo").innerHTML = 5 + 6;
</script>

</body>
</html>
Changing the innerHTML property of an HTML element is a common way to display data in HTML.

Using document.write()
For testing purposes, it is convenient to use document.write():

Example
<!DOCTYPE html>
<html>
<body>

<h1>My First Web Page</h1>
<p>My first paragraph.</p>

<script>
document.write(5 + 6);
</script>

</body>
</html>
Using document.write() after an HTML document is fully loaded, will delete all existing HTML:

Example
<!DOCTYPE html>
<html>
<body>

<h1>My First Web Page</h1>
<p>My first paragraph.</p>

<button type="button" onclick="document.write(5 + 6)">Try it</button>

</body>
</html>
The document.write() method should only be used for testing.


Using window.alert()
You can use an alert box to display data:

Example
<!DOCTYPE html>
<html>
<body>

<h1>My First Web Page</h1>
<p>My first paragraph.</p>

<script>
window.alert(5 + 6);
</script>

</body>
</html>
Using console.log()
For debugging purposes, you can use the console.log() method to display data.

You will learn more about debugging in a later chapter.

Example
<!DOCTYPE html>
<html>
<body>

<script>
console.log(5 + 6);
</script>

</body>
</html>




JavaScript Function Scope
In JavaScript there are two types of scope:

Local scope
Global scope
JavaScript has function scope: Each function creates a new scope.

Scope determines the accessibility (visibility) of these variables.

Variables defined inside a function are not accessible (visible) from outside the function.

Local JavaScript Variables
Variables declared within a JavaScript function, become LOCAL to the function.

Local variables have local scope: They can only be accessed within the function.

Example
// code here can not use carName

function myFunction() {
    var carName = "Volvo";

    // code here can use carName

}
Since local variables are only recognized inside their functions, variables with the same name can be used in different functions.

Local variables are created when a function starts, and deleted when the function is completed.

Global JavaScript Variables
A variable declared outside a function, becomes GLOBAL.

A global variable has global scope: All scripts and functions on a web page can access it.

Example
var carName = " Volvo";

// code here can use carName

function myFunction() {

    // code here can use carName

}
JavaScript Variables
In JavaScript, objects and functions are also variables.

Scope determines the accessibility of variables, objects, and functions from different parts of the code.


Automatically Global
If you assign a value to a variable that has not been declared, it will automatically become a GLOBAL variable.

This code example will declare a global variable carName, even if the value is assigned inside a function.

Example
myFunction();

// code here can use carName

function myFunction() {
    carName = "Volvo";
}
Strict Mode
All modern browsers support running JavaScript in "Strict Mode".

You will learn more about how to use strict mode in a later chapter of this tutorial.

Global variables are not created automatically in "Strict Mode".

Global Variables in HTML
With JavaScript, the global scope is the complete JavaScript environment.

In HTML, the global scope is the window object. All global variables belong to the window object.

Example
var carName = "Volvo";

// code here can use window.carName

Warning
Do NOT create global variables unless you intend to.

Your global variables (or functions) can overwrite window variables (or functions).
Any function, including the window object, can overwrite your global variables and functions.

The Lifetime of JavaScript Variables
The lifetime of a JavaScript variable starts when it is declared.

Local variables are deleted when the function is completed.

In a web browser, global variables are deleted when you close the browser window (or tab), but remain available to new pages loaded into the same window.

Function Arguments
Function arguments (parameters) work as local variables inside functions.

JavaScript Date Input
There are generally 3 types of JavaScript date input formats:

Type	Example
ISO Date	"2015-03-25" (The International Standard)
Short Date	"03/25/2015"
Long Date	"Mar 25 2015" or "25 Mar 2015"
The ISO format follows a strict standard in JavaScript.

The other formats are not so well defined and might be browser specific.

JavaScript Date Output
Independent of input format, JavaScript will (by default) output dates in full text string format:

Wed Mar 25 2015 05:30:00 GMT+0530 (India Standard Time)
JavaScript ISO Dates
ISO 8601 is the international standard for the representation of dates and times.

The ISO 8601 syntax (YYYY-MM-DD) is also the preferred JavaScript date format:

Example (Complete date)
var d = new Date("2015-03-25");
The computed date will be relative to your time zone.
Depending on your time zone, the result above will vary between March 24 and March 25.


ISO Dates (Year and Month)
ISO dates can be written without specifying the day (YYYY-MM):

Example
var d = new Date("2015-03");
Time zones will vary the result above between February 28 and March 01.

ISO Dates (Only Year)
ISO dates can be written without month and day (YYYY):

Example
var d = new Date("2015");
Time zones will vary the result above between December 31 2014 and January 01 2015.

ISO Dates (Date-Time)
ISO dates can be written with added hours, minutes, and seconds (YYYY-MM-DDTHH:MM:SSZ):

Example
var d = new Date("2015-03-25T12:00:00Z");
Date and time is separated with a capital T.

UTC time is defined with a capital letter Z.

If you want to modify the time relative to UTC, remove the Z and add +HH:MM or -HH:MM instead:

Example
var d = new Date("2015-03-25T12:00:00-06:30");
UTC (Universal Time Coordinated) is the same as GMT (Greenwich Mean Time).

Omitting T or Z in a date-time string can give different result in different browser.

Time Zones
When setting a date, without specifying the time zone, JavaScript will use the browser's time zone.

When getting a date, without specifying the time zone, the result is converted to the browser's time zone.

In other words: If a date/time is created in GMT (Greenwich Mean Time), the date/time will be converted to CDT (Central US Daylight Time) if a user browses from central US.

JavaScript Short Dates.
Short dates are written with an "MM/DD/YYYY" syntax like this:

Example
var d = new Date("03/25/2015");
WARNINGS !
In some browsers, months or days with no leading zeroes may produce an error:

var d = new Date("2015-3-25");
The behavior of "YYYY/MM/DD" is undefined.
Some browsers will try to guess the format. Some will return NaN.

var d = new Date("2015/03/25");
The behavior of  "DD-MM-YYYY" is also undefined.
Some browsers will try to guess the format. Some will return NaN.

var d = new Date("25-03-2015");
JavaScript Long Dates.
Long dates are most often written with a "MMM DD YYYY" syntax like this:

Example
var d = new Date("Mar 25 2015");
Month and day can be in any order:

Example
var d = new Date("25 Mar 2015");
And, month can be written in full (January), or abbreviated (Jan):

Example
var d = new Date("January 25 2015");
Example
var d = new Date("Jan 25 2015");
Commas are ignored. Names are case insensitive:

Example
var d = new Date("JANUARY, 25, 2015");
Date Input - Parsing Dates
If you have a valid date string, you can use the Date.parse() method to convert it to milliseconds.

Date.parse() returns the number of milliseconds between the date and January 1, 1970:

Example
var msec = Date.parse("March 21, 2012");
document.getElementById("demo").innerHTML = msec;
You can then use the number of milliseconds to convert it to a date object:

Example
var msec = Date.parse("March 21, 2012");
var d = new Date(msec);
document.getElementById("demo").innerHTML = d;
