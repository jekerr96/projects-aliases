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
