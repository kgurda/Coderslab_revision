# Zaawansowane PHP
## Zaawansowane działanie na stringach


Każde zadanie rozwiąż w osobnym pliku:
* ```zadanie01.php```,
* ```zadanie02.php```.


### Zadanie 1
Napisz trzy funkcje. Każda z nich powinna przyjmować adres email (napis w postaci `imię.nazwisko@firma.com.pl`) i zwracać:
  1. Imię i nazwisko wyciągnięte z maila. Pamiętaj, że zarówno imię, jak i nazwisko rozpoczynają się dużą literą.
  2. Nazwę firmy i nazwisko.
  3. Inicjały danej osoby.

### Zadanie 2
Napisz funkcję, która powinna przyjmować adres email (napis w postaci `imię.nazwisko@firma.com.pl`) i zwracać tablicę z wszystkimi alisami odpowiedniono zaczynającymi się od `i.nazwisko@` lub `nazwisko@` i kończących się na `@firma.pl` lub `@poczta.firma.pl`.

```
input -> jan.kowalski@coderslab.com.pl
output -> j.kowalski@coderslab.com.pl, kowalski@coderslab.com.pl, jan.kowalski@coderslab.pl, jan.kowalski@poczta.coderslab.pl
```
