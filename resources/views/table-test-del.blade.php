@extends('layouts.master')

 <style>
  @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");

body {
  background-color: #6d695c;
  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAACVBMVEUAAAAAAAAAAACDY+nAAAAAA3RSTlMmDQBzGIDBAAAAG0lEQVR42uXIIQEAAADCMHj/0NdkQMws0HEeAqvwAUGJthrXAAAAAElFTkSuQmCC);
  font-size: 100%;
  color: #333;
  font-family: Lato, Arial, sans-serif;
  padding: 0;
  margin: 0;
}

main {
  display: block;
  box-sizing: border-box;
  width: auto;
  padding: 1em 2vw;
  margin: 1em 2vw;
  color: #000;
  background-color: rgba(204, 204, 204, 0.7);
  border: 0.07em solid rgba(0, 0, 0, 0.5);
  border-radius: 0.5em;
}

table {
  margin: 1em 0;
  border-collapse: collapse;
/*   width: 100%; */
}

caption {
  text-align: left;
  font-style: italic;
  padding: 0.25em 0.5em 0.5em 0.5em;
}

th,
td {
  padding: 0.25em 0.5em 0.25em 1em;
  vertical-align: text-top;
  text-align: left;
  text-indent: -0.5em;
}

th {
  vertical-align: bottom;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  font-weight: bold;
}

td::before {
  display: none;
}

tr:nth-child(even) {
  background-color: rgba(255, 255, 255, 0.25);
}

tr:nth-child(odd) {
  background-color: rgba(255, 255, 255, 0.5);
}

td:nth-of-type(2) {
  font-style: italic;
}

th:nth-of-type(3),
td:nth-of-type(3) {
  text-align: right;
}

div {
  overflow: auto;
}

@media screen and (max-width: 37em), print and (max-width: 5in) {
  table,
  tr,
  td {
    display: block;
  }
  tr {
    padding: 0.7em 2vw;
  }
  th,
  tr:first-of-type {
    display: none;
  }
  td::before {
    display: inline;
    font-weight: bold;
  }
  td {
    display: grid;
    grid-template-columns: 4em auto;
    grid-gap: 1em 0.5em;
  }
  caption {
    font-style: normal;
    background-color: rgba(0, 0, 0, 0.35);
    color: #fff;
    font-weight: bold;
  }
  td:nth-of-type(3) {
    text-align: left;
  }
  td:nth-of-type(4), td:nth-of-type(5) {
    text-align: right;
    width: 12em;
  }
  td:nth-of-type(4)::before, td:nth-of-type(5)::before {
    text-align: left;
  }
  td:nth-of-type(2)::before {
    font-style: normal;
  }
}

@media print {
  body {
    font-size: 6pt;
    color: #000;
    background-color: #fff;
    background-image: none;
  }
  body,
  main {
    margin: 0;
    padding: 0;
    background-color: #fff;
    border: none;
  }
  table {
    page-break-inside: avoid;
  }
  div {
    overflow: visible;
  }
  th {
    color: #000;
    background-color: #fff;
    border-bottom: 1pt solid #000;
  }
  tr {
    border-top: 1pt solid #000;
  }
}

@media print and (max-width: 5in) {
  caption {
    color: #000;
    background-color: #fff;
    border-bottom: 1pt solid #000;
  }
  table {
    page-break-inside: auto;
  }
  tr {
    page-break-inside: avoid;
  }
}
 </style>
@section('content')



 <main>
    <h1>Responsive Table That Also Scrolls if Necessary</h1>
    <div role="region" aria-labelledby="Cap1" tabindex="0">
      <table id="Books">
        {{-- <caption id="Cap1">Books I May or May Not Have Read</caption> --}}
        <tr>
          <th>Author</th>
          <th>Title</th>
          <th>Year</th>
          <th>ISBN-13</th>
          <th>ISBN-10</th>
        </tr>
        <tr>
          <td>Miguel De Cervantes</td>
          <td>The Ingenious Gentleman Don Quixote of La Mancha</td>
          <td>1605</td>
          <td>9783125798502</td>
          <td>3125798507</td>
        </tr>
        <tr>
          <td>Mary Shelley</td>
          <td>Frankenstein; or, The Modern Prometheus</td>
          <td>1818</td>
          <td>9781530278442</td>
          <td>1530278449</td>
        </tr>
        <tr>
          <td>Herman Melville</td>
          <td>Moby-Dick; or, The Whale</td>
          <td>1851</td>
          <td>9781530697908</td>
          <td>1530697905</td>
        </tr>
        <tr>
          <td>Emma Dorothy Eliza Nevitte Southworth</td>
          <td>The Hidden Hand</td>
          <td>1888</td>
          <td>9780813512969</td>
          <td>0813512964</td>
        </tr>
        <tr>
          <td>F. Scott Fitzgerald</td>
          <td>The Great Gatsby</td>
          <td>1925</td>
          <td>9780743273565</td>
          <td>0743273567</td>
        </tr>
        <tr>
          <td>George Orwell</td>
          <td>Nineteen Eighty-Four</td>
          <td>1948</td>
          <td>9780451524935</td>
          <td>0451524934</td>
        </tr>
      </table>
    </div>
    
    
  </main>
<script src="{{asset('js/myTableResponsive.js')}}"></script>

   
@endsection