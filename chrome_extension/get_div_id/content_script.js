// Object to hold information about the current page
var pageInfo = {
    "div_tag": "current_div_id", // TODO: get current div id
    "url": window.location.href
};

// Send the information back to the extension
chrome.extension.sendRequest(pageInfo);