/**
 * YLB.app.js
 */

window.app = {
  login: {
    init: function(){
      if ( navigator.userAgent.indexOf('Chrome') > -1 || navigator.userAgent.indexOf('Safari') > -1  || navigator.userAgent.indexOf('Firefox') > -1) {
        window.onload = function(){
          window._xxx= setInterval(function(){
            $('input:-webkit-autofill').each(function(){
              $(this).after($(this).clone(true));
              $(this).remove();
              clearInterval(window._xxx);
            });
          },10);
        };
        $(window).on('load resize', function(){
          $('.chrome').removeClass('hide');
          $('.margin-10').css('margin-top', Math.max(parseInt(($(window).height() - $('#login-panel').height()) / 2), 10) + 'px');
          $('#left-banner').css('margin-top', Math.max(0, parseInt(($('#login-panel').height() - $('#left-banner').height()) / 2)));
        });
      } else {
        $('.not-chrome').removeClass('hide');
        if ( navigator.userAgent.toLowerCase().indexOf('mac') > -1 ) {
          $('.btn-win').addClass('hide');
        } else if ( navigator.userAgent.toLowerCase().indexOf('win') > -1 ) {
          $('.btn-mac').addClass('hide');
        }
        if ('undefined' === typeof navigator.language || /zh-(cn|tw)/.test(navigator.language.toLowerCase())) {
          $('.alert-en').addClass('hide');
        } else {
          $('.alert-cn').addClass('hide');
        }
      }
    },
    login: function(a){
      $.ajax({
        url: $(a).attr('action'),
        type: $(a).attr('method'),
        data: $(a).serialize(),
        dataType: 'json',
        error: function(a){
          window.app['captcha'].reset();
          bootbox.setDefaults({  backdrop: true, escape: true});
          try{
            eval('var json='+a.responseText);
            str = '';
            for(i in json){
              str += json[i] + '<br/>';
            }
            return bootbox.alert(str);
          }catch(e){}
          return bootbox.alert('网络错误');
        },
        success: function(json){
          if(0 !== json.head.statusCode){
            window.app['captcha'].reset();
            bootbox.setDefaults({  backdrop: true, escape: true});
            return bootbox.alert(json.head.note);
          }
          return location.href = '/';
        }
      });
      return;
    }
  },
  captcha: {
    reset: function(){
      if('undefined' !== typeof LUOCAPTCHA) LUOCAPTCHA.reset();
    }
  }
};

if('object' !== typeof console) console = {}; if('function' !== typeof console.info) console.info = function(){};
console.info(':-)');
console.info('永利宝正在招聘PHP、自动化测试...');
console.info('PHP工程师Job Demands:'+"\n"+'1、本科或本科以上学历，具有良好和规范的代码书写习惯'+"\n"+'2、精通PHP，熟悉 Linux+Nginx+php+Mysql 网站架构，熟悉设计模式'+"\n"+'3、3年以上网站或互联网产品开发经验，对高并发有着深刻的实践'+"\n"+'4、熟悉 Linux 操作，有 LNMP 的部署与性能调优经验；一定英文文档阅读能力'+"\n"+'5、具有较强的团队意识，高度的责任感，对工作积极严谨，勇于承担压力');
console.info('自动化测试程师Job Demands:'+"\n"+'1、3年以上互联网行业测试或手机测试项目经验，熟悉Android、iOS app、网页app测试；具备接口测试方面经验'+"\n"+'2、计算机相关专业，本科以上学历'+"\n"+'3、熟悉软件测试基本理论和技术、软件开发和测试流程，熟悉接口测试方法和实践'+"\n"+'4、最起码能有一种语言的编程经历，如Java/PHP/Python等'+"\n"+'5、有一定的API自动化测试经验，使用过接口的开发工具soapui、jmeter、postman或其他开源工具'+"\n"+'6、有搭建接口自动化测试框架相关经验，并且可以独立带项目测试'+"\n"+'7、很强的学习能力和技术钻研能力，严谨工作作风，良好的沟通能力，善于团队合作，能够承受一定的工作压力，以此为长期奋斗的事业');
console.info('猛击-> https://github.com/Yonglibao/X');
