document.getElementById("idSpecies").addEventListener("change", function (e) {
  let idSpecies = e.target.value;
  let src;
  let name;
  let price;
  for (let i = 0; i < species.length; i++) {
    if (idSpecies == species[i]["id"]) {
      src = species[i]["avatar"];
      name = species[i]["name"];
      price = priceSpecies[i] * 3;
    }
  }
  image.setAttribute("src", src);
  contentPrice.innerHTML =
    price + " <img src='public/images/pokedollar.png' height='20px' />";
  document.getElementById("price").value = price;
});

let selectFree = document.getElementById("idSpecies2");
selectFree.addEventListener("change", function (e) {
  let nameFree = selectFree.options[selectFree.selectedIndex].text;
  let price = pricesFree[nameFree];
  document.getElementById("price2").value = price;
  document.getElementById("priceFree").innerHTML =
    "Redonnez sa liberté à ce pokemon vous accordera " +
    price +
    ' <img src="public/images/pokedollar.png" height="20px" /> par la Société Protectrice des Pokemons';
});

let population = document.getElementById("population").textContent;
let inputAdd = document.getElementById("addPokemon");
if (population === " Population : 6" && populationName !== "Reserve") {
  document.getElementById("population").textContent += " (max)";
  inputAdd.classList.add("d-none");
}

if (cleanliness === "Sale") {
  document.getElementById("imgFence").classList.add("dirty");
}
