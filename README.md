CobraTriangle
=============

Installation av ramverket
-------------------------

1. Klona från github https://github.com/benjoyd/CobraTriangle.git eller ladda ner en zip och packa upp på lämplig plats https://github.com/benjoyd/CobraTriangle/archive/master.zip
2. Gör katalogen site/data skrivbar med chmod. *Cd CobraTriangle; chmod 777 site/data*.
3. För att installera på studentservern behöver du öppna .htaccess-filen och skriva in sökvägen till platsen där du installerat ramverket på raden *Rewritebase*. Ta även bort eventuella #-tecken. Exempelvis #RewriteBase /~akronym/CobraTriangle/ blir RewriteBase /~akronym/CobraTriangle/.
4. Öppna sidans sökväg i din webbläsare och klicka på *module/install* för att slutföra installationen.

Anpassa ramverkets utseende
----------------------------

+ Ändra till en egen logo genom att lägga en bildfil i din temamapp(standardtemat är lokaliserat under site/themes/istheme) och ändra i *config.php*(i sitemappen) på rad 179 till namnet på din logofil. Standardnamnet på logofilen är *logo_80x80.png*. Här finns även möjligheten att ändra favicon och storleken på logon.
+ För att ändra huvudtiteln på sidan så kolla på rad 176, 'header', standardtitel är *CobraTriangle*. raden under, 177, är för slogan och standardslogan är *A PHP-based MVC-inspired CMF*.
+ För att ändra till en egen text i foten av sidan så görs det på rad 182, man bör lämna &lt;p&gt; taggarna runt texten men det är inget måste om man vet vad man gör.
<pre>
176	  'header' => 'CobraTriangle',
177	  'slogan' => 'A PHP-based MVC-inspired CMF',
178:  'favicon' => 'logo_80x80.png',
179:  'logo' => 'logo_80x80.png',
180:  'logo_width'  => 80,
181:  'logo_height' => 80,
182:  'footer' => '&lt;p&gt;CobraTriangle &copy; by Benjamin based on Lydia &copy; by Mikael Roos&lt;/p&gt;',
</pre>
