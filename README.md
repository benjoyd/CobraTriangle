CobraTriangle
=============

Installation av ramverket
-------------------------

1. Klona från github https://github.com/benjoyd/CobraTriangle.git eller ladda ner en zip och packa upp på lämplig plats https://github.com/benjoyd/CobraTriangle/archive/master.zip
2. Gör katalogen site/data skrivbar med chmod. "Cd CobraTriangle; chmod 777 site/data".
3. För att installera på studentservern behöver du öppna .htaccess-filen och skriva in sökvägen till platsen där du installerat ramverket på raden "Rewritebase". Ta även bort eventuella #-tecken. Exempelvis #RewriteBase /~akronym/CobraTriangle/ blir RewriteBase /~akronym/CobraTriangle/.
4. Öppna sidans sökväg i din webbläsare och klicka på "module/install" för att slutföra installationen.

Anpassa ramverkets utseéende
----------------------------

+ Ändra till en egen logo genom att lägga en bildfil i din temamapp(standardtemat är lokaliserat under site/themes/istheme) och ändra i config.php(i sitemappen) på rad 179 till namnet på din logofil:
<pre>
178  'favicon' => 'logo_80x80.png',
179  'logo' => 'logo_80x80.png',
180  'logo_width'  => 80,
181  'logo_height' => 80,
</pre>