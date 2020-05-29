if (document.getElementsByClassName('ProfileFound')) {
    let profiles = document.getElementsByClassName('ProfileFound');
    for (let i = 0; i < profiles.length; i++) {
        profiles[i].addEventListener('click', () => {
            if (document.cookie == "")
                document.cookie = `historique=[${JSON.stringify({
                    id: profiles[i].getAttribute('data-id'),
                    date: new Date().toJSON().slice(0, 19).replace('T', ' ')
                })}]; expires=Wed, 29 May 2030 12:00:00 UTC; path=/`;
            else {
                let coockieData = [];
                const cookieValue = document.cookie
                    .split('; ')
                    .find(row => row.startsWith('historique'))
                    .split('=')[1];
                // 
                coockieData = JSON.parse(cookieValue);
                coockieData.push({
                    id: profiles[i].getAttribute('data-id'),
                    date: new Date().toJSON().slice(0, 19).replace('T', ' ')
                });
                // 
                document.cookie = `historique=${JSON.stringify(coockieData)};path=/`;
            }
            // 
            window.location.href = profiles[i].getAttribute('data-href');
        });
    }
}
// 
// 