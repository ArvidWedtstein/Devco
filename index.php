<?php
  include('header.php');
  // get_header();
?>
<div x-data="{ open: false }">
  <button @click="open = ! open">Toggle Navigation</button>

  <template x-teleport="body">
    <div x-show="open" x-data="{ tabs: ['🤑', '❤️', '😲', 'D'] }" class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col bg-gray-900 text-white shadow-lg not-italic">
      <template x-for="tab in tabs">
        <i x-text="tab" class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-discord-800 text-green-500 not-italic hover:bg-green-600 hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear"></i>
      </template>
    </div>
  </template>
</div>
<div style="text-align: center" class="container mx-auto px-4">
  <div class="w-100 p-3 bg-dblue">
    <h3 class="text-3xl">Våre tjenester:</h3>
    <ul class="list-none" x-data="{ tjenester: ['Webutvikling', 'Design'] }">
      <template x-for="tjeneste in tjenester">
        <li>
          <div class="bg-dgrey text-white rounded-md m-1 p-3 transition ease-in-out delay-0 hover:shadow-devco duration-200 hover:border-solid border-2 border-black-800">
              <p class="text-white-600" x-text="tjeneste"></p>
          </div>
        </li>
      </template>
    </ul>
  </div>
</div>


<?php
  include('footer.php');
  // get_footer();
?>