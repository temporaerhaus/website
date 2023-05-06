(async function() {
  // spaceapi currently disabled
  return;


  function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }

  const SPACEAPI_URL = 'https://spaceapi.verschwoerhaus.de/spaceapi/';

  var response, spaceapi;
  try {
    response = await fetch(SPACEAPI_URL);
    if (!response.ok) {
      throw new Error('spaceapi: network failed');
    }
    spaceapi = await response.json();
  } catch (error) {
    console.error(error);
    return;
  }
  var state = spaceapi.state.open;
  var stateClass = state ? 'open' : 'closed';
  var stateClassCap = capitalize(stateClass);

  document.querySelectorAll('.vsh-door-unknown').forEach(el => el.classList.replace('vsh-door-unknown', `vsh-door-${stateClass}`));
  document.querySelectorAll('.space-state').forEach(el => {
    el.classList.replace('space-state--unknown', `space-state--${stateClass}`);
    var text = el.dataset[`i18n${stateClassCap}`];
    if (typeof text === 'undefined') {
      text = stateClassCap;
    }
    el.innerText = text;
    el.dataset['state'] = stateClass;
  });
})();

$(document).ready(function() {
  if ($('.tabs')) {
    $('.tabs .tab-content .tab').each(function() {
      var tabID = $(this).attr("id");
      var tabTitle = $(this).attr("title");

      var active = "";
      if ($(this).hasClass("active")) active = "class='active'";

      $('.tabs .tab-links').append("<li " + active + "><a href='#" + tabID + "'>" + tabTitle + "</a></li>");
    });

    $('.tabs .tab-links a').on('click', function(e) {
      var currentAttrValue = $(this).attr('href');

      // Show/Hide Tabs
      $('.tab-content ' + currentAttrValue).first().show().siblings().hide();

      // Change/remove current tab to active
      $(this).parent('li').addClass('active').siblings().removeClass('active');

      e.preventDefault();
    });

    function getURLParameter(name) {
      return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search) || [, null])[1]
      );
    }

    var tabName = getURLParameter("tab");
    if (tabName) {
      $('.tabs .tab-links a').each(function() {
				if ($(this).attr("href") == "#" + tabName) $(this).click();
      });
      $("#" + tabName)[0].scrollIntoView();
    }
  }
});
