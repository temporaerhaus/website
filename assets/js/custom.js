(async function(){
	function capitalize(str) {
    	return str.charAt(0).toUpperCase() + str.slice(1);
	}

	const SPACEAPI_URL = 'https://verschwoerhaus.de/feed/spaceapi';

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