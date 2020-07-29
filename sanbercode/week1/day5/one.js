var items = [['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', 'logitek.jpg'],
['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', 'msi.jpg'],
['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', 'genius.jpeg'],
['004', 'Mouse Jerry', 30000, 'Mouse yang sangat disukai kucing', 'jerry.jpg'],
['005', 'Poster Naruto', 500000, 'Poster anime murah', '220px-NarutoCoverTankobon1.jpg']];
function dataRow(items) {
  var has = "";
  for (var i = 0; i < items.length; i++) {
    has += `      <div class="col col-lg-4 pt-2 pt-1">
    <div class="card">
      <div class="card-body">
        <img class="card-img-top" src="img/`+ items[i][4] + `"height="150px" alt="Card image cap">
        <h5 class="card-title" id="itemName">`+ items[i][1] + `</h5>
        <p class="card-text" id="itemDesc">`+ items[i][3] + `</p>
        <p class="card-text">Rp Harga `+ items[i][2] + `</p>
        <a href="#" class='btn btn-primary' id='addCart' onclick='onClick()'>Tambahkan ke keranjang</a>
      </div>
    </div>
  </div>`;
  }
  return has;
}

var formItem = document.getElementById("formItem")
var searchItem = document.getElementById("keyword")
formItem.addEventListener("submit", function (e) {
  e.preventDefault()
  let bigItems = []
  for (let i = 0; i < items.length; i++) {
    let c = 0
    for (let j = 0; j < items[i].length; j++) {
      if (items[i][j].toString().toLowerCase().indexOf(searchItem.value.toLowerCase()) != -1) c++
    }
    if (c > 0)
      bigItems.push(items[i]);
  }

  document.getElementById('listBarang').innerHTML = dataRow(bigItems);
})
document.getElementById('listBarang').innerHTML = dataRow(items);


var clicks = 0;
function onClick() {
  clicks += 1;
  document.getElementById("total").innerHTML = clicks;
};