// main.js
document.addEventListener('DOMContentLoaded', () => {
	document.getElementById('load-more').addEventListener('click', () => {
		import('./additional-module.js')
			.then((module) => {
				module.loadFunction();
			})
			.catch((error) => {
				console.error('Error loading the module:', error);
			});
	});
});
