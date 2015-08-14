
{*
 * MobFirst
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file AFL_license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to support@mobfirst.com so we can send you a copy immediately.
 *
 * @author    MobFirst <support@mobfirst.com>
 * @copyright MobFirst
 * @license   http://opensource.org/licenses/AFL-3.0 Academic Free License ("AFL"), in the version 3.0
 *}
	
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300'/>
	<link rel="stylesheet" type="text/css" href="{$mod_dir|escape:'htmlall':'UTF-8'}views/css/style.css">
	<link rel="stylesheet" href="{$mod_dir|escape:'htmlall':'UTF-8'}views/css/font-awesome.min.css" type='text/css'>
	
    <section id="first">
      <div class="wrapper">
        <div class="col-1">
          <ul>
            <li>
              <a class="logo">Mob1st</a>
              <h1>{l s='Your very own Apps for only $149/mo' mod='mobfirst'}</h1>
            </li>
            <li>
              <a class="mobiles">Android + iOS</a>
              <h3>{l s='We build beautiful, easy to use, Android + iOS mobile commerce apps for your Prestashop store.' mod='mobfirst'}</h3>
            </li>
            <li>
              <a class="edit">Edit</a>
              <h3>{l s='You\'ll be able to customize the main details of the apps to truly make them your own while still keeping the structural identity created by our team of highly skilled designers so your customers would have the best experience.' mod='mobfirst'}</h3>
            </li>          
          </ul>
        </div>
        <div class="col-2">
          <ul>
            <li><h2>{l s='Create your MobFirst Account' mod='mobfirst'}</h2></li>
            <li><h4>{l s='By clicking \"Hire Now\" you\'ll be redirected to PayPal\'s payment page, and after that into your app\'s Control Panel' mod='mobfirst'}</h4></li>
            <li>
				<form action="{$mobfirst_url|escape:'htmlall':'UTF-8'}" name="megaform" method="POST">
					<input type="hidden" name="email" value="{$shop_email|escape:'htmlall':'UTF-8'}">
					<input type="hidden" name="name" value="{$shop_name|escape:'htmlall':'UTF-8'}">
					<input type="hidden" name="reference" value="{$shop_reference|escape:'htmlall':'UTF-8'}">
					<input type="hidden" name="url" value="{$shop_url|escape:'htmlall':'UTF-8'}">
					<input type="hidden" name="code" value="{$shop_code|escape:'htmlall':'UTF-8'}">
					<input type="hidden" name="ws_key" value="{$shop_ws_key|escape:'htmlall':'UTF-8'}">
					<input type="hidden" name="language" value="{$shop_lang|escape:'htmlall':'UTF-8'}">
					<input type="submit" value="{l s='HIRE NOW' mod='mobfirst'}" class="mobfirst_button hire">
					<input type="submit" value="{l s='SIGN IN' mod='mobfirst'}" class="mobfirst_button signin">
				</form>
			</li>
            <li><h5>{l s='Or sign-in if you\'re already a MobFirst client' mod='mobfirst'}</h5></li>          
        </div>
      </div>
    </section>
    <section id="second">
      <div class="wrapper second-wr">
        <div class="right col-60">
          <ul>
            <li>
              <h6><i class="fa fa-paper-plane-o blue"></i>{l s='CONVERSION RATES' mod='mobfirst'}</h6>
              <p>{l s='Great mobile experience and apps can increase your conversion rates dramatically. Great experience equals great results.' mod='mobfirst'}</p>
            </li>
            <li>
              <h6><i class="fa fa-bar-chart-o blue"></i>{l s='MOBILE DATA' mod='mobfirst'}</h6>
              <p>{l s='We\'re here to help you understand how your clients shop with their mobile phones. Get the most out of their experience.' mod='mobfirst'}</p>
            </li>
		</ul>
		<ul>
			<li>
			  <h6><i class="fa fa-taxi blue"></i>{l s='ON THE GO' mod='mobfirst'}</h6>
			  <p>{l s='Mobility is the biggest advantage. Shoppers take your store with them at all times. So even if at home, watching TV or while on the bus, you’ll be open to them.' mod='mobfirst'}</p>
			</li>
			<li>
			  <h6><i class="fa fa-bullhorn blue"></i>{l s='PUSH NOTIFICATIONS' mod='mobfirst'}</h6>
			  <p>{l s='Push notifications are your apps best friend. They’ll help engage your customer and truly enhance the mobile experience.' mod='mobfirst'}</p>
			</li>
		</ul>
        </div>
      </div>
    </section>
    <section id="third">
      <div class="wrapper">
        <span class="quote">
          <span>{l s='"Mobile is the future of everything."' mod='mobfirst'}</span><br/>
          <small>Forbes.com</small>
        </span>
      </div>
    </section>
    <section id="fourth">
      <div class="wrapper">
        <span class="left {l s='pyramid' mod='mobfirst'}"></span>
        <span class="right fourth-text">
          <span>
            <h6 class="dark-gray">{l s='YOUR APPS' mod='mobfirst'}</h6>
            <p><strong>MobFirst</strong> {l s='pulls everything from your platform.' mod='mobfirst'}<br/>{l s='You should worry about sales and that\'s it.' mod='mobfirst'}</p>
          </span>
          <span>
            <h6 class="gray">{l s='YOUR E-COMMERCE PLATFORM' mod='mobfirst'}</h6>
            <p>{l s='Our technology will be integrated with your platform, giving you an exclusive iOS and Android app.' mod='mobfirst'}</p>
          </span>
          <span>
            <h6 class="blue">{l s='YOUR BUSINESS' mod='mobfirst'}</h6>
            <p>{l s='Your business and goals are at the base of everything. We build on top of it.' mod='mobfirst'}</p>
          </span>
        </span>
      </div>
    </section>
    <section id="fifth">
      <div class="wrapper">
        <span class="left col-3">
          <i class="fa fa-coffee blue"></i>
          <h6>{l s='PLACES' mod='mobfirst'}</h6>
          <p>{l s='More than 75% of smartphone users claim they use their mobile devices while: at home, at work, on the go, in a store, restaurant or cafés.' mod='mobfirst'}</p>
        </span>
        <span class="left col-3">
          <i class="fa fa-users blue"></i>
          <h6>+1.5 BI</h6>
          <p>{l s='There are more than 1.5 billion smartphones in the world today.' mod='mobfirst'}</p>
        </span>
        <span class="right col-3">
          <i class="fa fa-desktop blue"></i>
          <h6>{l s='SCREEN SIZE/USABILITY' mod='mobfirst'}</h6>
          <p>{l s='The main reason people why people, who don’t shop through their phones, give up is due to bad user experience.' mod='mobfirst'}</p>
        </span>
      </div>
    </section>
    <section id="sixth">
      <div class="wrapper">
        <h1>{l s='Mobile Usage by 2018' mod='mobfirst'}</h1>
        <span class="left col-50">
          <p>{l s='Mobile is already the go-to platform worldwide. Mobile connections have grown more than 40% year-over-year since 2007 and don’t appear to be slowing down. To prove that, Mobile Commerce grew 117% from 2012-2013 and the projections are for na average of 50% yearly growth until 2018.' mod='mobfirst'}</p>
          <p>{l s='People are starting to realize that they can do more with their phones than simply play games, text, chat and interact socially. Now smartphone owners are shopping, searching for products, making decisions, working and all sorts of other activities that used to be desktop/laptop only.' mod='mobfirst'}</p>
          <p>{l s='Goldman Sachs predicts that Mobile Commerce by 2018 will be bigger than traditional eCommerce today and account for roughly 50% of all eCommerce.' mod='mobfirst'}</p>
        </span>
        <span class="right col-50">
          <ul>
            <li><span class="not-full">{l s='WORLD\'S SMARTPHONE PENETRATION BY 2018' mod='mobfirst'}</span> <span class="blue right">65%</span></li>
            <li><span class="not-full">{l s='EXPECTED YEARLY MOBILE COMMERCE GROWTH' mod='mobfirst'}</span> <span class="blue right">50%</span></li>
            <li><span class="not-full">{l s='MOBILE COMMERCE VS ECOMMERCE' mod='mobfirst'}</span> <span class="blue right">50%</span></li>
            <li><span class="not-full">{l s='MOBILE CONNECTIONS WILL BE 80% FASTER' mod='mobfirst'}</span> <span class="blue right">0%</span></li>
            <li><span class="not-full">{l s='MOBILE DATA USAGE WILL BE 11 TIMES HIGHER' mod='mobfirst'}</span></li>
          </ul>
        </span>
      </div>
    </section>