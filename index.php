<?php require 'premadefunctions.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Premade PHP Functions</title>
	</head>
	<body>
		<p>All pages using this function must include or require the "premadefunctions.php" file</p>
		<p><strong>Seconds to Hours (sth(input)):</strong></p>
		<p>Returns with the inputted seconds as Hours (must echo the function)</p>
		<p>Input: 3493204</p>
		<p>Output: <?php echo sth(3493204); ?></p>
		<br>
		<p><strong>Seconds to Hours:Minutes (sthm(input)):</strong></p>
		<p>Returns with the inputted seconds as Hours:Minutes (must echo the function)</p>
		<p>Input: 3493204</p>
		<p>Output: <?php echo sthm(3493204); ?></p>
		<br>
		<p><strong>Seconds to Hours:Minutes:Seconds (sthms(input)):</strong></p>
		<p>Returns with the inputted seconds as Hours:Minutes:Seconds (must echo the function)</p>
		<p>Input: 3493204</p>
		<p>Output: <?php echo sthms(3493204); ?></p>
		<br>
		<p><strong>Download (download(file-location)):</strong></p>
		<p>Downloads the inputted file when page loaded (Note: Do not put HTML on the page with the function.)</p>
		<p>Input: file</p>
		<p>Output: <a href="examples/download.php">Click me</a> (Downloads an empty file named "file")</p>
		<br>
		<p><strong>Double-hash (doublehash(text)):</strong></p>
		<p>Hashes the inputted text through MD5 and SHA1 (must echo the function)</p>
		<p>Input: "Johnodon is awesome!"</p>
		<p>Output: <?php echo doublehash("Johnodon is awesome!"); ?></p>
		<br>
		<p><strong>Tripple-hash (tripplehash(text)):</strong></p>
		<p>Hashes the inputted text through MD5 and SHA1 and back through MD5 (must echo the function)</p>
		<p>Input: "Johnodon is awesome!"</p>
		<p>Output: <?php echo tripplehash("Johnodon is awesome!"); ?></p>
		<br>
		<p><strong>Get-ip (getip()):</strong></p>
		<p>Gets the IP of the user viewing the page. (must echo the function)</p>
		<p>Input: none</p>
		<p>Output: <?php echo getip(); ?></p>
		<br>
		<p><strong>Get-cloudflare-ip (getcloudflareip()):</strong></p>
		<p>If you are running through a cloudflare proxy you can use this function to get the IP of the user viewing the page (must echo the function)</p>
		<p>Input: none</p>
		<p>Output: <?php echo getcloudflareip(); ?></p>
		<br>
		<p><strong>simpleHTML (simpleHTML(title, content)):</strong></p>
		<p>Creates an HTML file with what you inputted (do not echo this function)</p>
		<p>Input: "Johnodon SimpleHTML Test", "&lt;p&gt;Hello World!&lt;/p&gt;"</p>
		<p>Output: <a target="_blank" href="examples/simpleHTML.php">Click me</a> </p>
		<br>
		<p><strong>styledHTML (StyledHTML(title, content, style)):</strong></p>
		<p>Creates an HTML file with what you inputted with a stylesheet (do not echo this function)</p>
		<p>Input: "Johnodon StyledHTML Test", "&lt;p&gt;Hello World!&lt;/p&gt;", "body {background-color: black;} p {color:white;}"</p>
		<p>Output: <a target="_blank" href="examples/styledHTML.php">Click me</a> </p>
		<br><br>
		<p><strong>Copyright &copy; 2020 Johnodon. All Rights Reserved.</strong></p>
	</body>
</html>
