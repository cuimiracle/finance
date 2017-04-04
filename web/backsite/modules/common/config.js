MYSITE.value('InitData', {
  title: '',
  content: '',
  photo: '',
  link_url: '',
  link_name: '',
  price: '',
  description: '',
  name: '',
  order: '',
  file_path: ''
}).value('InitTechData', {
  id: '',
  content: '',
  author_work: '',
  author_name: '',
  photo: ''
}).constant('PageMap', {
  home: {
    banner: 'site-banner',
    intro: 'site-ideal-trade',
    bigImg: 'site-single-pic',
    picText: 'site-single-bottom-detail',
    bottom: 'site-single-bottom'
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
  news: {
    company: 'company-dynamics',
    news: 'company-news',
    industry: 'industry-dynamics'
  },
  tech: {
    main: 'tech-data'
  },
  software: {
    software: 'upload-file'
  }
}).filter('to_trusted', ['$sce', function($sce){
  return function(text) {
    return $sce.trustAsHtml(text);
  };
}]);