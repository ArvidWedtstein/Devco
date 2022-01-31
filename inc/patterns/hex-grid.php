<?php
/**
 * Hex Grid
 */
return array(
	'title'      => __( 'Hex Grid', 'Devco' ),
	'categories' => array( 'featured' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"var(--wp--custom--spacing--small, 1.25rem)","bottom":"var(--wp--custom--spacing--small, 1.25rem)"}}},"backgroundColor":"foreground","textColor":"background","layout":{"inherit":true}} -->
    <div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--custom--spacing--small, 1.25rem);padding-bottom:var(--wp--custom--spacing--small, 1.25rem)"><!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide"><!-- wp:site-title {"level":0} /-->

    <!-- wp:paragraph {"align":"right"} -->
    <div class="bg-black hexContainer">
    <div class="hexContainer">
    <ul class="hexGrid">
      <li class="hex">
        <div class="hexIn">
          <div class="background"></div>
          <a class="hexLink" href="#">
            <div class="hexImg" :style="background-color: red;"></div>
            <h1 class="hexTxtTitle orange-fade">A</h1>
            <p class="hexTxtDesc">IMG</p>
          </a>
        </div>
      </li>
      <li class="hex">
        <div class="hexIn">
          <div class="background"></div>
          <a class="hexLink" href="#">
            <div class="hexImg" :style="background-color: blue;"></div>
            <h1 class="hexTxtTitle orange-fade">Number</h1>
            <p class="hexTxtDesc">IMG</p>
          </a>
        </div>
      </li>
      <li class="hex">
        <div class="hexIn">
          <div class="background"></div>
          <a class="hexLink" href="#">
            <div class="hexImg" :style="background-color: green;"></div>
            <h1 class="hexTxtTitle orange-fade">Number</h1>
            <p class="hexTxtDesc">IMG</p>
          </a>
        </div>
      </li>
      <li class="hex">
        <div class="hexIn">
          <div class="background"></div>
          <a class="hexLink" href="#">
            <div class="hexImg" :style="background-color: red;"></div>
            <h1 class="hexTxtTitle orange-fade">Number</h1>
            <p class="hexTxtDesc">IMG</p>
          </a>
        </div>
      </li>
    </ul>
    </div>
    </div>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group -->',
);

