const cacheName = `raspberry-pi-navody-1.2`;
self.addEventListener('install', e => {
	e.waitUntil(
		caches.open(cacheName)
			.then(cache => { return cache.addAll([
				`/`,
				`/css/style.css`
			])
			.then(() => self.skipWaiting());
		})
	);
});

self.addEventListener('activate', event => {
	event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', event => {
	event.respondWith(
		fetch(event.request).catch(function() {
			return caches.match(event.request);
		})
	);
});
