// popup.js
//
// Discription: Handles the onload function to grab the tab url and place it in the text box on the page.
//
// Tim Duffy
// April 16th, 2012

document.onload = doload();

function doload()
{

	chrome.tabs.getSelected(null, function(tab)
	{
	
		populateTextBox(tab.url);
	
	});

}

function populateTextBox(url)
{
	
	var TheTextBox = document.getElementById("id_url");
	TheTextBox.value = url;
}