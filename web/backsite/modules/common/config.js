MYSITE.value('InitData', {
  title: '',
  content: '',
  photo: '',
  link_url: '',
  link_name: '',
  price: '',
  description: '',
  name: '',
  order: ''
}).constant('PageMap', {
  home: {
    banner: 'site-banner',
    intro: 'site-ideal-trade',
    bigImg: 'site-single-pic',
    picText: 'site-single-bottom-detail',
    bottom: 'site-single-bottom-detail'
  },
  product: {
    banner: 'product-main',
    content: 'product-detail'
  },
  college: {
    main: 'college'
  },
  help: {
    about: 'about',
    partner: 'partner',
    help: 'help'
  },
  tech: {
    main: 'tech-data'
  }
}).filter('to_trusted', ['$sce', function($sce){
  return function(text) {
    return $sce.trustAsHtml(text);
  };
}]);