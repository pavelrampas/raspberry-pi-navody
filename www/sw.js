const cacheName = `raspberry-pi-navody-1.1`;
self.addEventListener('install', e => {
	e.waitUntil(
		caches.open(cacheName)
			.then(cache => { return cache.addAll([`/`, `/css/style.css`])
			.then(() => self.skipWaiting());
		})
	);
});

self.addEventListener('activate', event => {
	event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', event => {
	event.respondWith(
		caches.open(cacheName)
			.then(cache => cache.match(event.request, {ignoreSearch: true}))
			.then(response => { return response || fetch(event.request); })
	);
});