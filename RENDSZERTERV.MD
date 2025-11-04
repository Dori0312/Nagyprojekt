# Rendszerterv
# GreenScreen Videó Értékelő Oldal
## Nagyprojekt

## A rendszer célja
Egy adatbázissal rendelkező film értékelő oldal, ahol a látogatók meg tudják
tekinteni kedvenc filmük leírását és mások értékelését. Regisztrált felhasználók
már tudnak értékelni és kommentelni a filmek alá.

## Projektterv

### Projektmunkások és felelőségek:
* Frontend:
    + Filipcsei István Koppány
* Feladatuk:
    + A felhasználók által elérhető felületek létrehozása. 
    + Oldal felépítés
    + Egységes, letisztul, felhasználóbarát grafikus design megalkotása
* Backend:
    + Filipcsei István Koppány
    + Veres Dóra
    +
* Feladatuk: 
    + A frontend kiszolgálása adatokkal.
    + Adatbázisok létrehozása, implementálás
    + Adatbázist kezelő logika megírása (php)
* Tesztelés:
    + Filipcsei István Koppány
    + Veres Dóra
    + 
* Feladatuk: Hibák feltárása az üzembe helyezés előtt.

## Üzleti folyamatok modellje

* Adminisztrátor
    + Bejelentkezés
    + Kommentek olvasása
    + Kommentek létrehozása
    + Kommentek törlése
    + Filmek értékelése
    + Filmek hozzáadása az adatbázishoz
    + Filmek törlése az adatbázisból
    + Film oldalak megtekintése
    + Felhasználók kezelése az adatbázisban
* Felhasználó
    + Bejelentkezés
    + Kommentek olvasása
    + Kommentek létrehozása
    + Saját kommentek törlése
    + Filmek értékelése
    + Film oldalak megtekintése
* Látogató
    + Regisztráció
    + Kommentek olvasása
    + Film oldalak megtekintése

## Követelmények

### Funkcionális követelmények

+ Kommentek tárolása (Csakis szöveget kezel)
+ Felhasználók adatainak tárolása (felhasználónév, jelszó, email)
+ Bejelentkezett felhasználó képes filmet értékelni, mely az adatbázisban kerül eltárolásra
+ A webes felület gördülékenyen kommunikál a hozzárendelt adatbázissal
+ A webes felületen kezel adatbázist (Film Hozzáadása, Kommentelés, Törlés funkciók)

### Nem funkcionális követelmények

- Nem regisztrált látogató esetén, nem jeleníti meg a számára elérhetetlen funkciókat (bizonyos gombok elrejtése, pl.: Kommentelés)
- Nem adminisztrátor látogató esetén, nem jeleníti meg a számára elérhetetlen funkciókat (bizonyos gombok elrejtése, pl.: Film Hozzáadása)
- Használatához telepítés nem szükséges

## Funkcionális terv

### 5.1 Rendszerszereplők

+ **ADMIN**
    - a rendszer felügyelete az elsődleges feladata, hozzáfér mindenhez, kezelni tudja az összes oldalon és adatbázisban megjelenő adatot

+ **FELHASZNÁLÓ**
    - különböző filmek alá kommentelhet és értékelhet

+ **LÁTOGATÓ**
    - az oldalon megjelenő filmeket és a felhasználók kommentjeit tekintheti meg
    - filmet nem értékelhet csak ha rendelkezik profillal

## Fizikai környezet
- Az alkalmazás asztali platformra készült, amely elérhető bármilyen PC-ről,
internet hozzáférés mellett.
- Semmilyen egyéb alkalmazás telepítése nem szükséges az alkalmazás futtatásához.

## Architekturális terv
### Backend szerver
- A webszerver XAMPP Apache disztribúcióval megy
- VSCODE php és sql
### Frontend kliens
- VSCODE html, css

## Adatbázis terv (DBML/dbdiagram.io)
### Táblák
- Felhasználók (id, name, email, password, created_at)
- Filmek (id, title, director, category, released, description, created_at)
- Értékelések (id, rating, user_id, movie_id, created_at)
- Kommentek (id, comment, user_id, movie_id, parent, created_at)
- Kategóriák (id, name)

[Vizuális Adatbázis Diagram Megtekintése](https://dbdiagram.io/d/Webshop-terv-68d53597d2b621e422e34d8d)

## Implementációs terv
### Backend (XAMPP Alapú)
A webszerveren futó PHP szkriptek (Apache alatt) tartalmazzák az üzleti logikát és az adatkezelést.
A külső rendszerek és a frontend (ha van) HTTP protokollnak megfelelően, REST architektúrához** hasonló API végpontokon keresztül kommunikálhatnak, főként JSON formátumú kérésekkel és válaszokkal. Ezeken a végpontokon keresztül lehet lekérni és módosítani a rendszer állapotát.
A MariaDB relációs adatbázis-kezelő rendszer fut a szerveren az adatok tárolására, kezelésére és karbantartására. A PHP a PDO (PHP Data Objects) interfészen keresztül csatlakozik az adatbázishoz.
### Frontend
A felhasználói felület, amely asztali alkalmazásban megjelenő weboldal 
formájában érhető el, HTML, CSS, nyelven íródott.

## Tesztterv

## Telepítési terv
+ XAMPP-ot futtatni egy gépen 0-24
+ XAMPP elérési mappájában az index.html az adatbázis meg a többi cucc, ami kell neki

## Karbantartási terv
### Tartalmi karbantartás
Az adminok manuálisan szűrik a csúnya kommenteket, és törlik azokat.
### Rendszeres karbantartás
Az adminok végzik a filmek feltöltését, hogy ne legyen hiba a leírásukban.
