define({ "api": [
  {
    "type": "get",
    "url": "menu/index",
    "title": "index",
    "version": "1.0.0",
    "name": "index",
    "group": "Menu",
    "description": "<p>菜品列表</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>令牌</p>"
          }
        ]
      }
    },
    "filename": "application/api/controller/MenuController.php",
    "groupTitle": "Menu",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:88/api/menu/index"
      }
    ]
  },
  {
    "type": "post",
    "url": "user/add",
    "title": "add",
    "version": "1.0.0",
    "name": "add",
    "group": "User",
    "description": "<p>用户添加</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "filename": "application/api/controller/UserController.php",
    "groupTitle": "User",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:88/api/user/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "user/edit",
    "title": "edit",
    "version": "1.0.0",
    "name": "edit",
    "group": "User",
    "description": "<p>修改密码</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>令牌</p>"
          }
        ]
      }
    },
    "filename": "application/api/controller/UserController.php",
    "groupTitle": "User",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:88/api/user/edit"
      }
    ]
  },
  {
    "type": "get",
    "url": "user/index",
    "title": "index",
    "version": "1.0.0",
    "name": "index",
    "group": "User",
    "description": "<p>用户详情</p>",
    "filename": "application/api/controller/UserController.php",
    "groupTitle": "User",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:88/api/user/index"
      }
    ]
  },
  {
    "type": "post",
    "url": "/api/user/login",
    "title": "login",
    "version": "1.0.0",
    "name": "login",
    "group": "User",
    "description": "<p>用户登录</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "filename": "application/api/controller/UserController.php",
    "groupTitle": "User",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:88/api//api/user/login"
      }
    ]
  }
] });
