function facebook()
{
    let fb_share = document.getElementById('fb_share');
    fb_share.href = 'http://www.facebook.com/share.php?u=' + encodeURIComponent(location.href);
}

function whatsapp()
{
    let whatsapp_share = document.getElementById('whatsapp_share');
    whatsapp_share.href = 'https://web.whatsapp.com/send?text=' + encodeURIComponent(location.href);
}

function twitter()
{
    let twitter_share = document.getElementById('twitter_share');
    twitter_share.href = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(location.href);
}