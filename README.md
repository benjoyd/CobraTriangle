CobraTriangle
=============

Installation av ramverket
-------------------------

1. Klona från github https://github.com/benjoyd/CobraTriangle.git eller ladda ner en zip och packa upp på lämplig plats https://github.com/benjoyd/CobraTriangle/archive/master.zip
2. Gör katalogen site/data skrivbar med chmod. *cd CobraTriangle; chmod 777 site/data*.
3. För att installera på studentservern behöver du öppna .htaccess-filen och skriva in sökvägen till platsen där du installerat ramverket på raden *Rewritebase*. Ta även bort eventuella #-tecken. Exempelvis #RewriteBase /~akronym/CobraTriangle/ blir RewriteBase /~akronym/CobraTriangle/.
4. Öppna sidans sökväg i din webbläsare och lägg till *module/install* i sökvägen och tryck på enter för att slutföra installationen.

Anpassa ramverkets utseende
----------------------------
+ För att anpassa typsnitt så kan man antingen göra ett eget tema eller ändra i style.css-filen lokaliserad i *site/themes/istheme*. Leta efter bodytaggen på rad 7 och i den så finns både color(som är textfärg) och font(typsnitt) specificerade.
+ För att ändra bakgrundsfärger så leta efter *background-color* i samma css-fil som ovan. **#B2AF92** är färgen på foten samt ovalda menyer. **#DDFBFF** är sidans huvudsakliga färg, som till mesta del finns i mitten av sidan. **#F9FEFF** är den *vita* färgen på sidan. **#69EEFF** är den starkaste blåa färgen i valda menyer och linjen som går över sidans top.
+ Ändra till en egen logo genom att lägga en bildfil i din temamapp(standardtemat är lokaliserat under *site/themes/istheme*) och ändra i *config.php*(i sitemappen) på rad 179 till namnet på din logofil. Standardnamnet på logofilen är *logo_80x80.png*. Här finns även möjligheten att ändra favicon och storleken på logon.
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

Anpassa ramverkets innehåll
---------------------------
+ För att lägga till innehåll i ramverket så går man till *content/create* och fyller i fälten. **Title** är sidans titel. **Key** är nyckelord. **Content** är innehållet på sidan. **Type** är antingen post ifall det är innehåll för bloggen eller page om det är en egen statisk sida. **Filter** är olika sätt att formatera texten, *markdown* rekomenderas(för alternativ hur man formaterar med markdown, sök på google.) 
+ I *config.php* kan man anpassa menyn eller ta bort den helt om man känner för det. Med ramverket kommer en hem-sida, en blogg och en gästbok, dessa länkas i menyn som standard. När du lägger till en sida i menyn så skriver du ett namn på din länk, samt texten som ska stå i menyn sist så lägger du till *page/view/* i 'url'-fältet, följt av id på din post/sida, tex *page/view/9*.

<pre>
129  'my-navbar' => array(
130    'home'      => array('label'=>'About Me', 'url'=>'my'),
131    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
132    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
</pre>

Exempel:
<pre>
'test' => array('label'=>'Test', 'url'=>'page/view/9'),
</pre>