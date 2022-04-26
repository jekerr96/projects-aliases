export async function requestJson(url) {
    const res = await fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'Accept-Type': 'application/json',
            'Cache-Control': 'no-cache',
        }
    });

    return await res.json();
}

export async function requestPostJson(url, body) {
    const headers = {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept-Type': 'application/json',
        'Cache-Control': 'no-cache',
    };

    if (!(body instanceof FormData)) {
        headers['Content-Type'] = 'application/json';
    }

    const res = await fetch(url, {
        method: 'POST',
        body,
        headers,
    });

    return await res.json();
}
