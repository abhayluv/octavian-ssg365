// get the country data from the plugin
const countryData = window.intlTelInput.getCountryData();
const input = document.querySelector("#phone");
const addressDropdown = document.querySelector("#address-country");

// populate the country dropdown
for (let i = 0; i < countryData.length; i++) {
  const country = countryData[i];
  const optionNode = document.createElement("option");
  optionNode.value = country.iso2;
  const textNode = document.createTextNode(country.name);
  optionNode.appendChild(textNode);
  addressDropdown.appendChild(optionNode);
}

// init plugin
const iti = window.intlTelInput(input, {
  initialCountry: "us",
  utilsScript: "js/utils.js?1727952657388" // just for formatting/placeholders etc
});

// set address dropdown's initial value
addressDropdown.value = iti.getSelectedCountryData().iso2;

// listen to the telephone input for changes
input.addEventListener('countrychange', () => {
  addressDropdown.value = iti.getSelectedCountryData().iso2;
});

// listen to the address dropdown for changes
addressDropdown.addEventListener('change', () => {
  iti.setCountry(addressDropdown.value);
});
