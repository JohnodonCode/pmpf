# Functions
This is a list of all functions in this package, and how to use them.

**Seconds to Hours (sth(input)):**
Returns with the inputted seconds as Hours (must echo the function)
Input: 3493204
Output: 970

**Seconds to Hours:Minutes (sthm(input)):**
Returns with the inputted seconds as Hours:Minutes (must echo the function)
Input: 3493204
Output: 970:20

**Seconds to Hours:Minutes:Seconds (sthms(input)):**
Returns with the inputted seconds as Hours:Minutes:Seconds (must echo the function)
Input: 3493204
Output: 970:20:04

**Download (download(file-location)):**
Downloads the inputted file when page loaded (Note: Do not put HTML on the page with the function.)
Input: file
Output:  [Click me](https://www.johnodon.com/pmpf/examples/download.php)  (Downloads an empty file named "file")

**Double-hash (doublehash(text)):**
Hashes the inputted text through MD5 and SHA1 (must echo the function)
Input: "Johnodon is awesome!"
Output: 77b4f1fa491b96cdacbc60ca8fe7bcb12f0389c5

**Tripple-hash (tripplehash(text)):**
Hashes the inputted text through MD5 and SHA1 and back through MD5 (must echo the function)
Input: "Johnodon is awesome!"
Output: f69ce60c5a3ca0a2208d709e824d59b6

**Get-ip (getip()):**
Gets the IP of the user viewing the page. (must echo the function)
Input: none
Output: IP

**Get-cloudflare-ip (getcloudflareip()):**
If you are running through a cloudflare proxy you can use this function to get the IP of the user viewing the page (must echo the function)
Input: none
Output: True IP

**simpleHTML (simpleHTML(title, content)):**
Creates an HTML file with what you inputted (do not echo this function)
Input: "Johnodon SimpleHTML Test", "`<p>Hello World!</p>`"
Output:  [Click me](https://www.johnodon.com/pmpf/examples/simpleHTML.php)

**styledHTML (StyledHTML(title, content, style)):**
Creates an HTML file with what you inputted with a stylesheet (do not echo this function)
Input: "Johnodon StyledHTML Test", "`<p>Hello World!</p>`", "body {background-color: black;} p {color:white;}"
Output:  [Click me](https://www.johnodon.com/pmpf/examples/styledHTML.php)

**Copyright © 2020 Johnodon. All Rights Reserved.**
<!--stackedit_data:
eyJoaXN0b3J5IjpbOTcxNzgwODc2LDYwOTQxMDcxNF19
-->