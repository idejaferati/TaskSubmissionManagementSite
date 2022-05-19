window.onload = function ()
{
    var header_content = `
    <div class="header-div">
        <a href="index.html">
            <div class="main-logo"></div>
        </a>
    </div>`;
    
    var footer_content = `  
    <div class="footer-div">
        <div class="footer-left-div">
            <a href="index.html">
                <div class="main-logo"></div>
            </a>
            <a href="https://www.facebook.com/UniversitetiPrishtines/" target="_blank" class="margin-10">Facebook
            </a>
            <a href="https://twitter.com/rektorati?lang=en" target="_blank" class="margin-10">
                Twitter
            </a>
            <a href="https://fj.linkedin.com/school/universiteti-i-prishtin%C3%ABs-hasan-prishtina-/" target="_blank" class="margin-10">
               LinkedIn
            </a>
            <p>&copy;2021 Universiteti i Prishtines.<br> All rights reserved.</p>
        </div>
        <div class="footer-right-div">
            <ul>
                <li>Contact Us:</li>
                <li>
                    <img src="../photo/location-icon.png" alt="Location"/>
                    <address style="display:inline-block">Agim Ramadani, Prishtine 10000</address>
                </li>
                <li>
                    <a href="tel:+383 45 444 444">
                        <img src="../photo/phone-icon.png" alt="Phone number"/>
                        <span>+383 45 444 444</span>
                    </a>
                </li>
                <li>
                    <a href="mailto:heliosas@gmail.com">
                        <img src="../photo/email-icon.png" alt="Contact us via Email"/>
                        <span>unipr@gmail.com</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>`;

    var header_element = document.getElementById('header');
    var footer_element = document.getElementById('footer');

    header_element.innerHTML = header_content;
    footer_element.innerHTML = footer_content;

}
