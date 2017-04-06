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
}).
value('CUSTOMER', {
  id: '',
  username: '',
  password: '',
  email: ''
}).value('ACCOUNT', {
  name: '',
  mobile: ''
}).constant('PageMap', {
  home: {
    banner: 'site-banner',
    feature: 'site-detail',
    intro: 'site-ideal-trade',
    subIntro: 'site-main',
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
    software: 'software',
    upload: 'upload-file'
  },
  customer: {
    customer: 'customers'
  },
  account: {
    account: 'online-account'
  }
}).filter('to_trusted', ['$sce', function($sce){
  return function(text) {
    return $sce.trustAsHtml(text);
  };
}]);