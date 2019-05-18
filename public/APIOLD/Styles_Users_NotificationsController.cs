using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    [APIAuthorizeAttribute]
    public class Styles_Users_NotificationsController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        //Lấy thông báo của tk
        // GET: api/GetStyles_Users_Notifications/{idUser}/{top}
        [HttpGet]
        [Route("api/GetStyles_Users_Notifications/{idUser}/{top}")]
        public HttpResponseMessage GetStyles_Users_Notifications(int idUser, int top)
        {
            try
            {
                var myInType = new string[] { "1", "2", "3", "4", "5", "6", "7", "8" };
                var list =
                   (from notifications in db.Styles_Users_Notifications
                    where notifications.ID_User == idUser
                    && myInType.Contains(notifications.ID_Type.ToString())
                    select notifications
                    ).OrderByDescending(x=>x.AddTime).Take(top).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                HttpStatusCode.OK,
                new RegisterResponseModel()
                {
                    status = true,
                    data = list,
                    error_message = ""
                }
                );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Update thông báo đã đọc
        // Post: api/PostStyles_Users_NotificationsAllRead/{idUser}
        [HttpGet]
        [Route("api/PostStyles_Users_NotificationsAllRead/{idUser}")]
        public HttpResponseMessage PostStyles_Users_NotificationsAllRead(int idUser)
        {
            try
            {
                var list =
                   (from notifications in db.Styles_Users_Notifications
                    where notifications.ID_User == idUser
                    select notifications
                    ).ToList();
                

                var resp = Request.CreateResponse<RegisterResponseModel>(
                HttpStatusCode.OK,
                new RegisterResponseModel()
                {
                    status = true,
                    data = list,
                    error_message = ""
                }
                );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }
    }
}