@extends('layouts.admin_layout.admin_layout')
<style>
  .row {
	 margin: 0 0 !important;
}
 .course_card {
	 margin: 25px 10px;
	 position: relative;
	 display: flex;
	 flex-direction: column;
	 min-width: 0;
	 word-wrap: break-word;
	 background-color: #fff;
	 background-clip: border-box;
	 transition: 0.25s ease-in-out;
}
 .course_card_img {
	 max-height: 100%;
	 max-width: 100%;
}
 .course_card_img img {
	 height: 250px;
	 width: 100%;
	 transition: 0.25s all;
}
 .course_card_img img:hover {
	 transform: translateY(-3%);
}
 .course_card_content {
	 padding: 16px;
}
 .course_card_content h3 {
	 font-family: nunito sans;
	 font-family: 18px;
}
 .course_card_content p {
	 font-family: nunito sans;
	 text-align: justify;
}
 .course_card_footer {
	 padding: 10px 0px;
	 margin: 16px;
}
 .course_card_footer a {
	 text-decoration: none;
	 font-family: nunito sans;
	 margin: 0 10px 0 0;
	 text-transform: uppercase;
	 color: #f96332;
	 padding: 10px;
	 font-size: 14px;
}
 .course_card:hover {
	 transform: scale(1.025);
	 border-radius: 0.375rem;
	 box-shadow: 0 0 2rem rgba(0, 0, 0, .25);
}
 .course_card:hover .course_card_img img {
	 border-top-left-radius: 0.375rem;
	 border-top-right-radius: 0.375rem;
}
 

</style>
@section('content')
<div class="card card-primary card-outline">
  <div class="card-body">
  <h5 class="card-title" style="color:#661421">Ticket Videos</h5>
    <div class="row mx-auto">
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="course_card">
          <div class="course_card_img">
            <video
            fluid="true"
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="400"
            height="200"
            data-setup="{}"
            poster="/images/admin_images/smt_background.png"
            >
            <source src="/images/admin_images/smt3.mp4" type="video/mp4" />
          </video>
          </div>
          <div class="course_card_content">
            <h3 class="title">Ticket System</h3>
            <p class="description">Übersicht und Info zum Ticketsystem. </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="course_card">
          <div class="course_card_img">
            <video
            fluid="true"
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="400"
            height="200"
            data-setup="{}"
            poster="/images/admin_images/Ticket_erstellen_background.png"
            >
            <source src="/images/admin_images/Ticket_Erstellen.mp4" type="video/mp4" />
          </video>
          </div>
          <div class="course_card_content">
            <h3 class="title">Benutzeranfrage</h3>
            <p class="description">Anleitung zur neuen Benutzeranfrage über das Ticket-System.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="course_card">
          <div class="course_card_img">
            <video
            fluid="true"
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="400"
            height="200"
            data-setup="{}"
            poster="/images/admin_images/inbox_background.png"
            >
            <source src="/images/admin_images/inbox3.mp4" type="video/mp4" />
          </video>
          </div>
          <div class="course_card_content">
            <h3 class="title">"Meine" Tickets</h3>
            <p class="description">Übersicht über die Ticketerstellung und bereits erledigte Tickets.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="course_card">
          <div class="course_card_img">
            <video
            fluid="true"
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="400"
            height="200"
            data-setup="{}"
            poster="/images/admin_images/teilnehmerList_background.png"
            >
            <source src="/images/admin_images/Teilnehmer_liste.mp4" type="video/mp4" />
          </video>
          </div>
          <div class="course_card_content">
            <h3 class="title">Teilnehmerliste</h3>
            <p class="description">Kurze Übersicht der Teilnehmerliste und Ihrer Funktionsweise.</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="d-flex flex-row">
  <div class="d-flex justify-content-around col-lg-12">
    <div class="card card-primary card-outline col-lg-6 mx-2">
      <div class="card-body">
      <h5 class="card-title" style="color:#661421">Profil Video</h5>
        <div class="row mx-auto">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="course_card">
              <div class="course_card_img">
                <video
                fluid="true"
                id="my-video"
                class="video-js"
                controls
                preload="auto"
                width="400"
                height="200"
                data-setup="{}"
                poster="/images/admin_images/profile.png"
                >
                <source src="/images/admin_images/profile.mp4" type="video/mp4" />
              </video>
              </div>
              <div class="course_card_content">
                <h3 class="title">Ticket System</h3>
                <p class="description">Übersicht und Info zum Ticketsystem. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-primary card-outline col-lg-6">
      <div class="card-body">
      <h5 class="card-title" style="color:#661421">Inventar Video</h5>
        <div class="row mx-auto">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="m-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill="#661421" d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z"/>
                <text x="12%" y="75%" fill="white" font-weight="bold" font-size="1.5px">TC-EF-VERW-12536</text>
                <text x="12%" y="20%" fill="#15803d" font-weight="bold" font-size="1.3px">2-1046-IT</text>
                <text x="12%" y="30%" fill="#0369a1" font-weight="bold" font-size="1.3px">Drucker / Scanner</text>
                <text x="12%" y="60%" fill="#6d28d9" font-weight="bold" font-size="1.5px">Gigaset C43362</text>
              </svg>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="m-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="#fde68a" d="M4 16H0V6h20v10h-4v4H4v-4zm2-4v6h8v-6H6zM4 0h12v5H4V0zM2 8v2h2V8H2zm4 0v2h2V8H6z"/>
                <text x="0%" y="10%" fill="black" font-weight="bold" font-size="1.5px">BROTHER MFC L8690CDW</text>
                <text x="35%" y="20%" fill="#15803d" font-weight="bold" font-size="1.3px">2-1046-IT</text>
                <text x="35%" y="38%" fill="#6d28d9" font-weight="bold" font-size="1.5px">Gigaset C43362</text>
                <text x="22%" y="97%" fill="#0369a1" font-weight="bold" font-size="1.4px">Drucker / Scanner</text>
              </svg>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="m-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="#0ea5e9" d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/>
                <text x="35%" y="20%" fill="#15803d" font-weight="bold" font-size="1.7px">2-1046-IT</text>
                <text x="0%" y="50%" fill="black" font-weight="bold" font-size="1.7px">02136549876542212</text>
                <text x="35%" y="38%" fill="#6d28d9" font-weight="bold" font-size="1.5px">Alcatel 8029</text>
                <text x="15%" y="97%" fill="#0ea5e9" font-weight="bold" font-size="1.4px">Telephone</text>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>  
<div class="d-flex flex-row">
  <div class="d-flex justify-content-around col-lg-12">
    <div class="card card-primary card-outline col-lg-12">
      <div class="card-body">
      <h5 class="card-title" style="color:#661421">Inventar Video</h5>
        <div class="row mx-auto">
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="m-2 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.2 460.2" style="enable-background:new 0 0 460.233 460.233" xml:space="preserve"><path style="fill:#d8d9dd" d="M309.1 441.5H151.3l19.8-89.5h118.3z"/><path style="fill:#d8d9dd" d="M131.6 431.3h197.2v18.3H131.6z"/><path style="fill:#59595a" d="m439.7 75.5.2.2v256H20.6v-256l.1-.2h419zm20.5 128.1v-128c0-10.8-9.6-20.4-20.5-20.4h-419A21 21 0 0 0 .2 75.7v255.9A21 21 0 0 0 20.7 352h419c10.9 0 20.5-9.6 20.5-20.4v-128z"/><path style="fill:#661421" d="m439.7 75.5.2.2v256H20.6v-256l.1-.2h419z"/><path style="opacity:.4;fill:#5b5b5f;enable-background:new" d="M131.6 431.3h197.2v18.3H131.6z"/><path style="opacity:.2;fill:#fff;enable-background:new" d="M180.3 362.1 153 374.2 0 27l27.3-12zM232.3 357.8l-27.3 12L52 22.7l27.3-12.1z"/>
                <text x="15%" y="25%" fill="#fff" font-weight="bold" font-size="30px">TC-EF-VERW-12536</text>
                <text x="35%" y="65%" fill="#81ea1c" font-weight="bold" font-size="30px">2-1046-IT</text>

              </svg>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="m-2 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 338.7 338.7" style="enable-background:new 0 0 338.665 338.665" xml:space="preserve"><path style="fill:#333233" d="M26.8 71.2H312v50H26.8z"/><path style="fill:#211922" d="M169.3 71.2h142.6v50H169.3z"/><path style="fill:#333233" d="M26.8 142.6H312v196.1H26.8z"/><path style="fill:#211922" d="M169.3 142.6h142.6v196.1H169.3z"/><path transform="rotate(-162.3 169.3 54.3)" style="fill:#333233" d="M38.1 39.3h262.5v30H38.1z"/><path style="fill:#211922" d="M169.3 38.5V70l120.5 38.6 9.1-28.6z"/><path style="fill:#dae4f4" d="M269.2 205.2H69.5l-7.7-28.1h215z"/><path style="fill:#c6d6ea" d="M169.3 177.1v28.1h99.9l7.6-28.1z"/><path style="fill:#dae4f4" d="M269.2 255.9H69.5l-7.7-28h215z"/><path style="fill:#c6d6ea" d="M169.3 227.9v28h99.9l7.6-28z"/><path style="fill:#dae4f4" d="M269.2 306.7H69.5l-7.7-28h215z"/><path style="fill:#c6d6ea" d="M169.3 278.7v28h99.9l7.6-28z"/><path style="fill:#fae16e" d="M199.3 84.6h37.6v28.2h-37.6z"/><path style="fill:#cf599b" d="M255.8 84.6h37.6v28.2h-37.6z"/>
                <text x="20%" y="90%" fill="#cf599b" font-weight="bold" font-size="25px">Drucker / Scanner</text>
                <text x="30%" y="75%" fill="#0369a1" font-weight="bold" font-size="25px">2-1046-IT</text>
                <text x="10%" y="50%" fill="#81ea1c" font-weight="bold" font-size="20px">BROTHER MFC L8690CDW</text>
              </svg>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="m-2 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm0 7c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9zm0 7c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2zM12 2v2h2V2h-2zm4 0v2h2V2h-2zm-4 7v2h2V9h-2zm4 0v2h2V9h-2zm-4 7v2h2v-2h-2zm4 0v2h2v-2h-2z"/>
                <text x="5%" y="18%" fill="#6d28d9" font-weight="bold" font-size="2px">Server01</text>
                <text x="5%" y="53%" fill="#15803d" font-weight="bold" font-size="2px">2-1046-IT</text>
                <text x="5%" y="88%" fill="#0369a1" font-weight="bold" font-size="2px">Server</text>
              </svg>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="m-2 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="#0ea5e9" d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/>
                <text x="35%" y="20%" fill="#15803d" font-weight="bold" font-size="1.7px">2-1046-IT</text>
                <text x="0%" y="50%" fill="black" font-weight="bold" font-size="1.7px">02136549876542212</text>
                <text x="35%" y="38%" fill="#6d28d9" font-weight="bold" font-size="1.5px">Alcatel 8029</text>
                <text x="15%" y="97%" fill="#0ea5e9" font-weight="bold" font-size="1.4px">Telephone</text>
              </svg>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="m-2 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" 
                xml:space="preserve"><path style="fill:#ccc" d="M33.1 462h63.2v24.2H33.1zM415.7 462h63.2v24.2h-63.2z"/>
                <path d="M498.4 462H13.6C6 462 0 455.9 0 448.4v-118c0-7.5 6.1-13.6 13.6-13.6h484.8c7.5 0 13.6 6 13.6 13.5v118.1c0 7.5-6.1 13.6-13.6 13.6z"/>
                <circle style="fill:#ffa624" cx="74.4" cy="389.4" r="16.8"/><circle style="fill:#09ba98" cx="121.8" cy="389.4" r="16.8"/>
                <circle style="fill:#05c3d6" cx="169.1" cy="389.4" r="16.8"/><path d="M383.7 119.4h12.2v197.3h-12.2z"/>
                <path style="fill:#999" d="M415.7 462h63.2v8.2h-63.2zM33.1 462h63.2v8.2H33.1z"/><circle style="fill:#05c3d6" cx="389.8" cy="130.1" r="22.1"/>
                <path style="fill:#05c3d6" d="M389.8 190.2A60.1 60.1 0 1 1 390 70a60.1 60.1 0 0 1-.2 120.2zm0-108a48 48 0 1 0 .1 95.9 48 48 0 0 0-.1-95.9z"/>
                <path style="fill:#05c3d6" d="M389.8 234.4a104.3 104.3 0 0 1 0-208.5 104.3 104.3 0 0 1 0 208.5zm0-196.3a92.1 92.1 0 0 0 0 184.1 92.1 92.1 0 0 0 0-184.1z"/>
                <path style="opacity:.25;fill:#fff;enable-background:new" d="M0 330.3v61.8h512v-61.8c0-7.4-6.1-13.5-13.6-13.5H13.6c-7.5 0-13.6 6-13.6 13.5z"/>
                <text x="35%" y="50%" fill="#15803d" font-weight="bold" font-size="30px">2-1046-IT</text>
                <text x="15%" y="70%" fill="#fff" font-weight="bold" font-size="30px">LANCOM ROUTER 1783VA</text>
                <text x="40%" y="95%" fill="#0ea5e9" font-weight="bold" font-size="30px">Router</text>
              </svg>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="m-2 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><path style="fill:#fff" d="M483.9 309.6H28c-9.9 0-17.9-8-17.9-18v-96c0-10 8-18 18-18h455.7c9.9 0 17.9 8 17.9 18v96c0 10-8 18-18 18z"/><circle style="fill:#ababab" cx="115.3" cy="243.6" r="64.3"/><circle style="fill:#8ae4ff" cx="115.3" cy="243.6" r="35.7"/><path d="M483.9 167.4H28A28.2 28.2 0 0 0 0 195.6v96a28.2 28.2 0 0 0 28.1 28.2h43.3v14.6a10.2 10.2 0 0 0 20.4 0v-14.6h328.4v14.6a10.2 10.2 0 0 0 20.4 0v-14.6H484a28.2 28.2 0 0 0 28.1-28.2v-96a28.2 28.2 0 0 0-28.1-28.2zM115.3 297.7a54.1 54.1 0 1 1 0-108.3 54.1 54.1 0 0 1 0 108.3zm-94.9-6v-96.1c0-4.3 3.5-7.8 7.7-7.8h38a74.3 74.3 0 0 0 0 111.6H28a7.8 7.8 0 0 1-7.7-7.8zm471.2 0c0 4.2-3.5 7.7-7.7 7.7H164.5a74.3 74.3 0 0 0 0-111.6h319.4c4.2 0 7.7 3.5 7.7 7.8v96z"/><path d="M115.3 197.7a46 46 0 1 0 0 92 46 46 0 0 0 0-92zm0 71.4a25.5 25.5 0 1 1 0-51 25.5 25.5 0 0 1 0 51zM466.1 200.8H354.9a10.2 10.2 0 0 0 0 20.4h111.2a10.2 10.2 0 0 0 0-20.4zM466.1 233.4H354.9a10.2 10.2 0 0 0 0 20.4h111.2a10.2 10.2 0 0 0 0-20.4zM466.1 266H460a10.2 10.2 0 0 0 0 20.4h6.1a10.2 10.2 0 0 0 0-20.4zM425.3 266H355a10.2 10.2 0 0 0 0 20.4h70.4a10.2 10.2 0 0 0 0-20.4z"/>
                <text x="35%" y="70%" fill="#15803d" font-weight="bold" font-size="30px">2-1046-IT</text>
                <text x="35%" y="30%" fill="#6d28d9" font-weight="bold" font-size="30px">Benq 1205</text>
                <text x="40%" y="50%" fill="#0ea5e9" font-weight="bold" font-size="30px">Beamer</text>
              </svg>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="m-2 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58 58" style="enable-background:new 0 0 58 58" xml:space="preserve">
                <path style="fill:#38454f" d="M55 43.6H3a3 3 0 0 1-3-3v-6a3 3 0 0 1 3-3h52a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3z"/>
                <path style="fill:#283238" d="M55 31.6H3l4.5-3.7c.3-.2.7-.3 1-.3h41c.3 0 .7 0 1 .3l4.5 3.7zM3 43.6h52l-4.5 3.6c-.3.2-.7.4-1 .4h-41c-.3 0-.7-.2-1-.4L3 43.6z"/>
                <path style="fill:#546a79" d="M8 34.6H5a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2zM8 38.6H5a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2zM15 34.6h-3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2zM15 38.6h-3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2zM19 36.6h3a1 1 0 1 0 0-2h-3a1 1 0 1 0 0 2zM22 38.6h-3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2z"/>
                <path style="fill:#38454f" d="M55 23.6H3a3 3 0 0 1-3-3v-6a3 3 0 0 1 3-3h52a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3z"/>
                <path style="fill:#283238" d="M55 11.6H3l4.5-3.7c.3-.2.7-.3 1-.3h41c.3 0 .7 0 1 .3l4.5 3.7z"/>
                <path style="fill:#1a2530" d="M3 23.6h52l-4.5 3.6c-.3.2-.7.4-1 .4h-41c-.3 0-.7-.2-1-.4L3 23.6z"/>
                <path style="fill:#546a79" d="M8 16.6H5a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2zM8 20.6H5a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2zM15 16.6h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2zM15 20.6h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2zM22 16.6h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2zM22 20.6h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2z"/>
                <circle style="fill:#546a79" cx="30" cy="34.6" r="1"/>
                <circle style="fill:#546a79" cx="30" cy="40.6" r="1"/><circle style="fill:#546a79" cx="32" cy="37.6" r="1"/><circle style="fill:#546a79" cx="34" cy="34.6" r="1"/>
                <circle style="fill:#546a79" cx="34" cy="40.6" r="1"/><circle style="fill:#546a79" cx="36" cy="37.6" r="1"/><circle style="fill:#546a79" cx="38" cy="34.6" r="1"/><circle style="fill:#546a79" cx="38" cy="40.6" r="1"/><circle style="fill:#546a79" cx="30" cy="14.6" r="1"/>
                <circle style="fill:#546a79" cx="30" cy="20.6" r="1"/><circle style="fill:#546a79" cx="32" cy="17.6" r="1"/><circle style="fill:#546a79" cx="34" cy="14.6" r="1"/><circle style="fill:#546a79" cx="34" cy="20.6" r="1"/><circle style="fill:#546a79" cx="36" cy="17.6" r="1"/>
                <circle style="fill:#546a79" cx="38" cy="14.6" r="1"/><circle style="fill:#546a79" cx="38" cy="20.6" r="1"/><path style="fill:#28384c" d="M16.1 50.4H10a.9.9 0 0 1-.9-.8v-2h8v2c0 .4-.4.8-.9.8zM48.1 50.4H42a.9.9 0 0 1-.9-.8v-2h8v2c0 .4-.4.8-.9.8z"/><circle style="fill:#283238" cx="51" cy="17.6" r="3"/>
                <circle style="fill:#81ea1c" cx="51" cy="17.6" r="2"/><circle style="fill:#283238" cx="51" cy="37.6" r="3"/><circle style="fill:#81ea1c" cx="51" cy="37.6" r="2"/>
                <text x="35%" y="90%" fill="#546a79" font-weight="bold" font-size="5px">Switch</text>
                <text x="30%" y="50%" fill="#fff" font-weight="bold" font-size="5px">2-1046-IT</text>
                <text x="12%" y="19%" fill="#81ea1c" font-weight="bold" font-size="4px">CISCO SG200 26PORT</text>
              </svg>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
</div>  
@endsection
@section('script')
<script>
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

  $(document).ready(function() {
    $.ajax({
    type:"GET",
    url: "{{route('news.popup.check')}}",
    success:function(result){
      if(result[0].isPublished === 'on') {
        var news_title = result[0].title;
        var news_body = result[0].body;
        Swal.fire({
      title: news_title,
      html: news_body,
      width: 600,
      padding: '3em',
      color: '#661421',
      showConfirmButton: false,
      backdrop: `
        rgba(102,20,33,0.5)
        url("/images/admin_images/helpdesk.gif")
        top 150px
        left 900px 
        no-repeat
      `
  })
      }else {
        //
      }
    }
   });
    
});
</script>
@endsection