<?php

/**
 * The resourceId is a sha1 from queryParams after serialize.
 *
 * @var array [string action => [string resourceId => string FileName]
 */
return [
    'acl-field-update' => [
        'a897da5833cf6a9c09672da200d6689a80ae8374' => 'status-ok',
        'cfce3ab0eac45314eb234d7564acb0b469f2c9c4' => 'status-no-access',
        'f2676da3c1191043674a63fbde23abdd8b91f311' => 'status-invalid',
        '0ecdd4a7778cb3bf3fa018f225a05fb4d63f5375' => 'status-ok',
        '35f35a3fcea9c4b0f63e48b652e8ff41e175dc24' => 'status-no-access',
    ],

    'common-info' => [
        '0b34b32f12106f1aa4aefefa3363a2bf826cb94b' => 'common-info',
        '684e8d69d8f4b646cc8007f667d784e0359f31c4' => 'common-info',
    ],

    'group-membership-update' => [
        '9ce09509fd50036522ef2cd3eb2087425ecc16ca' => 'status-ok',
        '15fe8f772ef7aed2dc4a5ff3ffe1fa70c574ba98' => 'status-no-access',
        '4efc7bdb8d942eae0fdd25ca0144e615ccfb496a' => 'status-invalid',
    ],

    'list-recordings' => [
        '7c8db3e9804cd73bea5842d7507e229ad0b01ffb' => 'list-recordings-success',
        '57b346ce02528b904643a12241f6488562d515f1' => 'status-no-data',
        '6337d6a112fb8394ccf6126adf4c39f9c41dbee5' => 'status-no-access',
    ],

    'login' => [
        'd635c464148d1934d1195a30edba072b35e59e9c' => 'status-ok',
        '54d6988c059905b6c7a87bbc10c3e84f538115e3' => 'status-no-data',
    ],

    'logout' => [
        'cac7b6bb995acffa265c6cc9c38c9904be3d4ad6' => 'status-ok',
    ],

    'meeting-feature-update' => [
        '9e3e9139f96e71464350095d4253ec1de899d0ff' => 'status-ok',
        'f07cee482738a7358945439350be95b740a7f49d' => 'status-no-access',
        '1fdd8d79c4be6c4c32dbe0dd1a9c0f6d6f94af05' => 'status-invalid',
    ],

    'permissions-info' => [
        '77077b221c5721b42ab1a46964ad364dae9bbe2f' => 'permissions-info-principal',
        '70cbb7f9a4bf3638e35791d87e2275c0e63c9c53' => 'status-no-data',
        'b3d3c88d6ac767514b5fb5a1afe144fb8af26ad3' => 'status-no-access',
        'fde09ab5a1cf65040a84f5b043d4e1fc9a48b2af' => 'permissions-info-all',
        'b5f4edc515660f23262ae1b0b19eb08620bf03d0' => 'permissions-info-filter-permission',
        '0178ea988d35f42f55a7dca5e40bad8acdd9cb6d' => 'permissions-info-all',
        'e669c55a3b61d8fb63e5f5d4c3c8041fc339b27d' => 'permissions-info-empty',
        'b98586ceac5c77a42cdfb5a5b0913299b9b07cb2' => 'status-no-access',
    ],

    'permissions-update' => [
        'af3954bf30a856dc2435178cce4e6d96973c7f7a' => 'status-ok',
        '06cc0fb08e01e7095a9c4ccb5749944a3a027470' => 'status-no-access',
        'd969b4ffdd2013af7e86051ee2c9136bb014f03c' => 'status-ok',
        '1392de72bf98475b8803ca36b46556ae868f08af' => 'status-no-access',
    ],

    'principals-delete' => [
        '6c39a7165c57b3339d1ddc39499f850cfa31bb99' => 'status-ok',
        '083cad6581fdbf158165192598040f2c18fcf9bd' => 'status-no-access',
    ],

    'principal-info' => [
        '49d78b23c62f9a7bc35704a4a5d4c6ab57cc3290' => 'principal-info-user',
        '618259e8dc03ad89e8261150b5adb14a9e460649' => 'principal-info-group',
        '8d355bf7aea07113487665e0eedd26e04b252688' => 'status-no-access',
    ],

    'principal-update' => [
        'd4c6302c6e7d507d51c2685a14b9799a4aa13555' => 'status-no-access',
        'b6f48bc3bc839d71125a58d7b655a816394ff024' => 'principal-update-create-user',
        'dd027af601b01328c685dda2ea8ed5dc76c58bc0' => 'principal-update-create-group',
        'e57456452205bf2f3f2c69ac0acebf5cc2dbc490' => 'status-no-access',
        '11814c0bb9e79f7e7774e751c33b114f51de3137' => 'status-ok',
        '1d4cdb7fbc249f4c92d5f1ba313d7cf0c12fbe64' => 'status-ok',
    ],

    'principal-list' => [
        'c228737ee01c96f5b6c3c88ab94cb390347e3647' => 'status-no-access',
        'c7d426c3410ec12370e5a4319f8aeff934c9565f' => 'principal-list-all',
        'a7d57a0f6758747a41a01d5939bdb68e6c23b511' => 'principal-list-sorter',
        'ec5d33500aa52c47e176076b19037113a94db903' => 'principal-list-filter',
        'e5ca329139ae19dcc7f898f0eef70362cc476257' => 'principal-list-empty',
        'c62181a8a91f197ecdaa48da840f9dbc4bab28c7' => 'principal-list-group-all',
        'e647bd522510da5a35148f2ed3d4760965db27ca' => 'principal-list-group-is-member',
        '46746af9d92511e1e98314e9044c62372380f707' => 'principal-list-group-is-not-member',
    ],

    'user-update-pwd' => [
        '11ea77bf237680b5fdd5ac60a6e3a06c19632bf8' => 'status-no-access',
        '2fe9a343ef6b504440ce255443dde531de5091ea' => 'status-ok',
        '0c7843c4664f026adf66f23d4986506cff3b09fe' => 'status-ok',
    ],

    'sco-delete' => [
        'fa080c80fc886df81b4f6f2b5adb027c5faa7bde' => 'status-no-access',
        'ced9e07bc427c0911de991aa2abcd903c39d215b' => 'status-ok',
    ],

    'sco-move' => [
        '65f42c29b115a4def23d9e9ffa241938a8973dfd' => 'status-no-access',
        'cfdfa3fde5666f035a0dfa24d56a63262e1b7afd' => 'status-invalid',
        '50cfe85816b4a2e0b1010c4bafd3097a8bfbed0d' => 'status-ok',
    ],

    'sco-update' => [
        'd27ef55e5f3c50eff7c7725fa7f11a2d13b0af05' => 'status-no-access',
        'e7c1d36c969f1b842e3f577799e08f0c163fd7a6' => 'status-no-access',
        '6577d9859bc326040289a69e57510f038013d7ff' => 'status-ok',
        '476de062ecd88b04ec4398225879d872505a5526' => 'sco-update',
        '799cdd559ce4ffe2f3c9dec702e696612105ab1e' => 'sco-update',
    ],

    'sco-info' => [
        'ed476bd99c42683e347d1ced864d1d13dbc527de' => 'status-no-access',
        'd88a2216b9fa963ffd42a451bb84aa32383bc919' => 'sco-info',
    ],

    'sco-contents' => [
        'ab3ec4c010dd996283c23f67d019ea82c900bd07' => 'status-no-access',
        '26db7bf23521a35b5167a32f6b9092f2f8cbe9bc' => 'status-no-access',
        '74691ab673641f00810aad3074a6850a09999e21' => 'sco-contents-empty',
        '5bc14ab36ba2a352287b186ca7ff4391dc59bf14' => 'sco-contents-empty',
        'f670ae196389edaf3c9ade93f49f378c53e8a5da' => 'sco-contents',
        '6fffd05a7bf8d7c045574c6597245de71d8f38e2' => 'sco-contents-filter',
        'a000d5a5d78ec628e7dd38f827edd8347f13a2e6' => 'sco-contents-sorter',
        '365f6cac0b010aa072b19c70cd5ffaa1f2f95cc0' => 'sco-contents-content',
    ],

    'sco-upload' => [
        'c9eb1fb91abdf561210c6ed6070f86d955f3bae6' => 'sco-upload',
        '02928b278f68e09e51b613af7204784c2cd23d9a' => 'sco-upload',
        '79e1cee478932205182b779d19852ee08f733731' => 'sco-upload',
        '59090e70781019b8a7152acec58c7e10db53f42b' => 'sco-upload',
    ],

    'sco-shortcuts' => [
        '1599eb3ff5957e32299c9c96b2effac6fa926a91' => 'sco-shortcuts',
        '07b715a4676ef0d75bdfca59c299fa404eed1b26' => 'status-no-access',
    ],
];
