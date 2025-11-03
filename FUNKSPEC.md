# Funkció specifikáció 

## Jelenlegi folyamat leírása 
Csapatunk egy filmértékelő weboldal létrehozását tervezi, amely lehetőséget biztosít a felhasználóknak, hogy megosszák véleményüket a látott filmekről. A platform célja, hogy a felhasználók ne csupán pontszámokkal, 
hanem kommentjeikkel is kifejezhetik véleményüket. Ezek mellett tudják kedvencek-be sorolni, illetve pipával jelezhetik ha már látták az adott filmet. 
Az oldal egyedi jellegét az adja, hogy nem egy hagyományos filmadatbázis, hanem egy modern,weboldalként működő közösségi felület, ahol a felhasználók könnyedén böngészhetnek, értékelhetnek és mások véleményére is reagálhatnak.
 
## Vágyalomrendszer leírása
Olyan webalkalmazás létrehozása a célunk, amely PC-n és laptopon minden felhasználó számára könnyen elérhető. Fontos, hogy az alkalmazás bármilyen operációs rendszeren elérhető legyen, ezért a Laravel keretrendszerben való fejlesztést választottuk.
A frontend megvalósításához JavaScript, HTML és CSS használata szükséges, így a felület dinamikus és reszponzív lesz. A backend PHP nyelven készül, amely a Laravel keretrendszer stabilitását és könnyű karbantarthatóságát biztosítja. Az adatbázis kezelésére SQL nyelvet használunk, ami precíz és megbízható működést tesz lehetővé. Célunk, hogy a kód tiszta és jól strukturált legyen, így később új fejlesztők is könnyen tudnak csatlakozni a projekthez. Az alkalmazásban a felhasználók jogosultságai elkülönítettek: két fő rangot különböztetünk meg, Admin és Felhasználó, hogy a rendszer biztonságos maradjon, és ne lehessen jogosulatlanul módosítani vagy törölni tartalmakat. Az adatbázis séma tekintetében fontos, hogy a különböző egyedeket külön táblákban tároljuk, és a rendszer a későbbiekben könnyen bővíthető, skálázható legyen. A portál kinézetére vonatkozó terveket a Képernyőtervek pont alatt részleteztük. Ezek ötvözésével egy modern, skálázható webalkalmazás készül, amely megfelel minden alapvető követelménynek, egyszerűen kezelhető és továbbfejleszthető.

## Jelenlegi üzleti folyamatok modellje

A mai világban a hagyományos filmértékelő oldalak sokszor nem képesek lépést tartani a változó filmes igényekkel és a modern közönség elvárásaival. Ezek az oldalak gyakran csak alapvető pontszámokat vagy rövid kritikákat kínálnak, amelyek kevéssé segítik a felhasználót abban, hogy valóban átfogó képet kapjon a filmekről. Bár egyesek nosztalgiából még élvezik ezeket az értékeléseket, azok, akik részletesebb, személyre szabott információkat keresnek, gyakran hosszú időt töltenek a megfelelő tartalmak felkutatásával. A régi portálok nem mindig tudják tükrözni a modern filmes trendeket és a felhasználók változó igényeit, így egyre nagyobb az igény olyan platformokra, amelyek friss, releváns és átfogó értékelésekkel segítik a felhasználókat a döntésben. Mi egy olyan webalkalmazást hozunk létre, amely kifejezetten a PC- és laptophasználó közönség számára nyújt könnyen elérhető, interaktív filmértékelő élményt, ahol mindenki megoszthatja saját véleményét, és inspiráló módon böngészhet mások értékelései között.

## Igényelt üzleti folyamatok modellje

A platformon a felhasználók értékelhetik a filmeket pontszámokkal, így könnyedén kiemelhetik a számukra legkedvesebb alkotásokat. Az értékelési rendszer biztosítja, hogy a legnépszerűbb filmek a lista élén jelenjenek meg, így a látogatók gyorsan megtalálhatják a közönség által legjobbnak ítélt filmeket. A regisztrált felhasználók testreszabhatják saját profiljukat, például módosíthatják nevüket és profilképüket. A rendszer két fő rangot különböztet meg – Admin és Felhasználó –, amelyek eltérő hozzáférési szinteket biztosítanak az oldal funkcióihoz és tartalmaihoz, így a biztonságos és rendezett működés garantált.

## Követelménylista

| Id  | Modul       | Név                     | Leírás |
|-----|------------|------------------------|--------|
| k1  | Felület    | Regisztráció            | A felhasználók ezen az oldalon tudnak saját fiókot létrehozni a rendszerben, így hozzáférnek a filmadatbázishoz. |
| k2  | Felület    | Bejelentkezés           | A felhasználók itt tudnak bejelentkezni, ha filmeket szeretnének megtekinteni, értékelni vagy kategorizálni igény szerint. |
| k3  | Felület    | Kategóriák              | A felhasználók a filmek kategóriáit választhatják ki, és ezen belül szűrhetnek. |
| k4  | Felület    | Filmek                  | Lehetőségük van megtekinteni a filmadatbázist, szűrhetnek év, értékelés, illetve cím szerint (A-Z, Z-A). |
| k5  | Felület    | Kommentelési lehetőség  | A felhasználók a filmekhez kapcsolódó kommentekben vitathatják meg véleményüket. |
| k6  | Felület    | Értékelési lehetőség    | Itt tudják értékelni kedvenc filmjeiket. |
| k7  | Felület    | Kedvencekhez adás       | Lehetőségük van kedvencekhez hozzáadni a megnézett filmeket. |
| k8  | Felület    | Megnézettként jelölés   | Lehetőségük van a már látott filmeket pipával jelölni. |
| k9  | Jogosultság| Jogosultsági szintek    | - **Admin**: filmek törlése, hozzáadása<br>- **Felhasználó**: tartalmak megtekintése, kommentelés, kedvencekhez adás, értékelés, megjelölés megtekintettként |

