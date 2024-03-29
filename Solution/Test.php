<?php

include_once __DIR__ . '../../autoload.php';

$solution = new Solution\Solution();

// $word = ['hello', 'world', 'leetcode'];
// $chars = 'welldonehoneyr';
// $result = $solution->countCharacters($word, $chars);

// $domain = [
//     '900 google.mail.com',
//     '50 yahoo.com',
//     '1 intel.mail.com',
//     '5 wiki.org'
// ];
// $result = $solution->subdomainVisits($domain);

// $nodeArray = [1, 1, 1, 1, 1, null, 1];
// $nodeArray = [2,2,2,5,2];
// $nodeArray = [1];
// $tree = new Solution\BinaryTree($nodeArray);
// $result = $solution->isUnivalTree($tree->root);

// $sortInput = [4, 2, 5, 7];
// $result = $solution->sortArrayByParityII($sortInput);

// $fibInput = 6;
// $result = $solution->fib($fibInput);

// $input = [[2]];
// $input = [[1, 2], [3, 4]];
// $input = [[1, 0], [0, 2]];
// $input = [[2, 2, 2], [2, 1, 2], [2, 2, 2]];
// $input = [[1, 1, 1], [1, 0, 1], [1, 1, 1]];
// $input = [[4, 0, 4], [4, 2, 4], [4, 4, 1]];
// $result = $solution->projectionArea($input);

// $inputArray = [3, 8, -10, 23, 19, -4, -14, 27];
// $result = $solution->minimumAbsDifference($inputArray);

//$arr1 = [2, 3, 1, 3, 2, 4, 6, 7, 9, 2, 19];
//$arr2 = [2, 1, 4, 3, 9, 6];
// $arr1 = [3, 19, 7, 29, 5, 17, 49, 45, 31, 44];
// $arr2 = [7, 3, 5, 29, 19];
// $result = $solution->relativeSortArray($arr1, $arr2);


// $caseJson =
// '{
//     "id":"1",
//     "children":[
//         {
//             "id":"2",
//             "children":[
//                 {
//                     "id":"5",
//                     "children":[],
//                     "val":5
//                 },
//                 {
//                     "id":"6",
//                     "children":[],
//                     "val":6
//                 }
//             ],
//             "val":3
//         },
//         {
//             "id":"3",
//             "children":[],
//             "val":2
//         },
//         {
//             "id":"4",
//             "children":[],
//             "val":4
//         }
//     ],
//     "val":1
// }';

// $tree = new Solution\DeepTree($caseJson);
// $result = $solution->maxDepth($tree->getRoot());
//  var_dump($result);

// $node = [5, 3, 6, 2, 4, null, 8, 1, null, null, null, 7, 9];
// $tree = new Solution\BinaryTree($node);
// $result = $solution->increasingBST($tree->root);
// var_dump($result);

// $input = ['bella', 'label', 'roller'];
// $input = ['cool', 'lock', 'cook'];
// $input = [
//     'afcgfbfcdeefhgcaaccgbcehehfbjfgfjacjijibfejjbggbfc',
//     'ceiiahidafgdhgcjibjgejhgfifcagiheifdgedidbbgagbiga',
//     'hejafbagbagiaheefibiafiigjjdjcfdhcffgiccecgbghcgcd',
//     'cdigjbeecehjgjhjgdaedbcddbhjaaidfjdfadibgjhfhahjhj',
//     'gcchbbdhcfiefdhcccdbjfhdgcfifhjhefcibdghafhcifajbh',
//     'gehjcigdbcbjfehcgdgbeadeejdiaieajhfgadfjfdieecbiie',
//     'jfihiccdidbaefbgjadgdgejifjhbaciafhjcdjcgabadhdeai',
//     'igbgdcaiicegacfhaijfjgaadafadcdcjhjdidiebfiefbfgic',
//     'giibgegaeiciffjgbadbaefdgabfajffbbgccdahiiaccjejji',
//     'abigijhajicjahfhchicfhabhgeeagcgiecfbfjhahhhhhbdjf',
//     'bceigabhbhcdjdifdaeedgigicffficajhiiggejfceeabgbcb',
//     'bcicijaeihjhfgbhihddafhcjgfhgafgeacchaaddjccjbfaah',
//     'bcaighaabjcifcgiiehbadiihbabhddfijjafdbebdjgbecafg',
//     'dbbjaehcfddgbegbhejccaebacfdaefaaieeghicijjagebejc',
//     'cfcfegcbbdiaejebbacbccbecbdeagbdgiigjcddbbhghgijfb',
//     'jfdhgecfbbfciffajaeehecdfdbificfabebdbdcjeigeejaej',
//     'jdedfebhhgdbbbgbhbfdifcedcgbfjaiiajfcgdbigbaffeeef',
//     'ejdfbhhibgdhdbbjdbhbhdbghahfageggdchjfjebbihcgffhg',
//     'hgdicjjgbihheeghfdcabhhhbdefaifigjfgeiajagbdibiaec',
//     'fbbddgceaigbfhcabahffcjhaiihggjjcgeiedacaiehggeafi',
//     'hhdgbbdcdbbjgjgjfggffbedfgjdhjifccdaeihdgahjdcghjf',
//     'hjdbbjbjaahjfjjbiajdcfbiiaaeehdfhgaeiihjedddhcjhad',
//     'beeafaagajchjdeehgijfaegigfcjidifgcjffhgcghdjieggj',
//     'cihafeibdhhcffjcifjhaggjhjbcdejffighcaddiagghegebd',
//     'gcebaedchchfefgibgbagfabihcjdhbhbhaccdehjjgbfdgjdd',
//     'fdgijfbibbfbagehddbbadhaaeaafjcacaccgbegcfejebbhdj',
//     'fgihbhbcfgbjcjbaihjbfajdjgdjgjifhecfbfigafedcfdcgd',
//     'egagahjdfcggchabfcdadjgbeggaghaaigggihfhjbgbbaefbe',
//     'ccgjebiicbbfcadffgbjhjibceageejibfgdghdececcchabdh',
//     'fddhfieefafegchcbihidgjgdjfhcajbgibjhaahefdcihbhdj',
//     'fbiajdfebhdbdijjgcacjdgjjafbgebcchigbfhigigdfgdaai',
//     'gfjgdfigcfcdjbcdfegeebcgicjdcebdhafecachbebghbhebg',
//     'jajbgihaaeabchfgdaijiehajcbcgabcahigdcdfdgejbghhdi',
//     'dbijdgfjgbbcihcdijbgdgehhaihibbhhejigbjbafiieedbac',
//     'geehiihebaiejcbbadicihgeifficfjaeibahebecjafahefjb',
//     'cdecbhibjgahjfhibebijgcbfggidiedcaefdgcjcafgjiefjd',
//     'iahghibjaehgghibhdjgjhidbhjdicchgdhcjhabajchbafjaj',
//     'ehgejcgajiecifgihafjibbjccigfdafeeigbhbdajdedejfhc',
//     'gdaefffedceiadjhefebaigicefjhdaifghbddgfccfafdfddd',
//     'gadhiabdbbdeebgchfijhbhhbbhbgcdbaaebegecehigihdihg',
//     'hgcdjcifjhhhcabdjbghjfcjiicjidhffhcfcgjgjaidgghijb',
//     'aedbebggbegifjdbiiggjbgfhghbgcdfbidfehbgehjhdhcbae',
//     'ebicdgciedcghghhcfffdhciagejccadjfdfjdacjafjbfbiff',
//     'bjeheechdbaihbacifaegiaiigjecheiaebchegjibdgfhcfac',
//     'hjdjcjdbehdejfifediccbfajadeddfijfahbdgfihbcffehic',
//     'ggihchfgieidfaabegibbjcibeefegjgiibbaggahghgaaeaag',
//     'ghgbbdfgdaaehhjcbiajbiejceeiiaeghhdiefdecjbfifehgc',
//     'ehfdicgbffbiegjabdffeeddejbfhfdfjfchbedfdeajibbdcg',
//     'cdffadffchiiihbiihccgbbaejafbbdijgabdbfifiajbeaeea',
//     'jgddbffdiebeadgchfcbbehihabjjdegfbdbajdacjhhidabbd'
// ];
// $result = $solution->commonChars($input);
// var_dump($result);exit;

// $input = [
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', '.', '.', 'p', '.', '.', '.', '.'],
//     ['.', '.', '.', 'p', '.', '.', '.', '.'],
//     ['p', 'p', '.', 'R', '.', 'p', 'B', '.'],
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', '.', '.', 'B', '.', '.', '.', '.'],
//     ['.', '.', '.', 'p', '.', '.', '.', '.'],
//     ['.', '.', '.', '.', '.', '.', '.', '.']
// ];

// $input = [
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', 'p', 'p', 'p', 'p', 'p', '.', '.'],
//     ['.', 'p', 'p', 'B', 'p', 'p', '.', '.'],
//     ['.', 'p', 'B', 'R', 'B', 'p', '.', '.'],
//     ['.', 'p', 'p', 'B', 'p', 'p', '.', '.'],
//     ['.', 'p', 'p', 'p', 'p', 'p', '.', '.'],
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', '.', '.', '.', '.', '.', '.', '.']
// ];

// $input = [
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', '.', '.', 'p', '.', '.', '.', '.'],
//     ['.', '.', '.', 'R', '.', '.', '.', 'p'],
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', '.', '.', 'p', '.', '.', '.', '.'],
//     ['.', '.', '.', '.', '.', '.', '.', '.'],
//     ['.', '.', '.', '.', '.', '.', '.', '.']
// ];

// $result = $solution->numRookCaptures($input);
// var_dump($result);exit;

// $num = 8;
// $result = $solution->divisorGame($num);
// var_dump($result);

// $input = 'abbaca';
// $result = $solution->removeDuplicates($input);
// var_dump($result);

// $input1 = [1];
// $input2 = 0;
// $input1 = [0, 10];
// $input2 = 2;
// $input1 = [1, 3, 6];
// $input2 = 3;
// $result = $solution->smallestRangeI($input1, $input2);
// var_dump($result);exit;

// $day = 31;
// $month = 8;
// $year = 2019;
// $day = 18;
// $month = 7;
// $year = 1999;
// $day = 15;
// $month = 8;
// $year = 1993;
// $result = $solution->dayOfTheWeek($day, $month, $year);
// var_dump($result);

// $input1 = 'loveleetcode';
// $input2 = 'e';
// $result = $solution->shortestToChar($input1, $input2);
// var_dump($result);

// $input1 = 'alice is a good girl she is a good student';
// $input2 = 'a';
// $input3 = 'good';
// $input1 = 'we will we will rock you';
// $input2 = 'we';
// $input3 = 'will';
// $result = $solution->findOcurrences($input1, $input2, $input3);
// var_dump($result);

// $input = ['h', 'e', 'l', 'l', 'o'];
// $solution->reverseString($input);
// var_dump($input);

// $r = 1;
// $c = 2;
// $r0 = 0;
// $c0 = 0;
// $r = 2;
// $c = 2;
// $r0 = 0;
// $c0 = 1;
// $r = 2;
// $c = 3;
// $r0 = 1;
// $c0 = 2;
// $result = $solution->allCellsDistOrder($r, $c, $r0, $c0);
// var_dump($result);

// $node1 = [3, 5, 1, 6, 2, 9, 8, null, null, 7, 4];
// $node2 = [3, 5, 1, 6, 7, 4, 2, null, null, null, null, null, null, 9, 8];
// $node1 = [1, 2];
// $node2 = [2, 2];
// $node1 = [1, 2, null, 3];
// $node2 = [1, 3];
// $tree1 = new Solution\BinaryTree($node1);
// $tree2 = new Solution\BinaryTree($node2);
// $result = $solution->leafSimilar($tree1->root, $tree2->root);
// var_dump($result);

// $input = [
//     [1, 2, 3],
//     [4, 5, 6],
//     [7, 8, 9]
// ];

// $input = [
//     [1, 2, 3],
//     [4, 5, 6]
// ];

// $result = $solution->transpose($input);
// var_dump($result);

// $input = [
//     'abcd',
//     'cdab',
//     'cbad',
//     'xyzz',
//     'zzxy',
//     'zzyx'
// ];
// $result = $solution->numSpecialEquivGroups($input);
// var_dump($result);

// $input1 = [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10];
// $input2 = 'abcdefghijklmnopqrstuvwxyz';
// $input1 = [4, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10];
// $input2 = 'bbbcccdddaaa';
// $result = $solution->numbersOfLines($input1, $input2);
// var_dump($result);

// $nums = [5, 2, 3, 1];
// $nums = [5, 1, 1, 2, 0, 0];
// $result = $solution->sortArray($nums);
// var_dump($result);

// $input = [4, 2, 1, 3];
// $list = new Solution\Lists($input);
// $result = $solution->insertionSortList($list->root);
// $list->root = $result;
// $result = $list->convertToArray();
// var_dump($result);

// $input = [2, 2, 2, 3, 3];
// $result = $solution->minCostToMoveChips($input);
// var_dump($result);