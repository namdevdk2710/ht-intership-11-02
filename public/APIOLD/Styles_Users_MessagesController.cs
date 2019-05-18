using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Data.SqlClient;
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
    public class Styles_Users_MessagesController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        //Lấy gian hàng gửi tin nhắn cho mình
        // GET: /api/GetStyles_Users_Messages/{idReceiver}
        [HttpGet]
        [Route("api/GetStyles_Users_Messages/{idReceiver}")]
        public HttpResponseMessage GetStyles_Users_Messages(int idReceiver)
        {
            try
            {
                var list =
                     (from mess in db.Styles_Users_Messages
                      join user in db.Styles_Users
                      on mess.ID_Sender equals user.ID_User
                      where mess.ID_Receiver == idReceiver
                      select new
                      {
                          User = user
                      }).ToList();
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

        //Lấy gian hàng gửi tin nhắn cho mình
        //Post: /api/PostDoMessage/{idReceiver}/{idSender}/{content}
        [HttpPost]
        [Route("api/PostDoMessage/{idReceiver}/{idSender}/{content}")]
        public HttpResponseMessage PostDoMessage(int idReceiver, int idSender, string content)
        {
            try
            {


              
                Styles_Users_Messages insertUsers_Messages = new Styles_Users_Messages();
                insertUsers_Messages.ID_Sender = idSender;
                insertUsers_Messages.ID_Receiver = idReceiver;
                insertUsers_Messages.Content = content;
                insertUsers_Messages.AddTime = DateTime.Now;
                insertUsers_Messages.IsRead = false;
                insertUsers_Messages.ReadTime = DateTime.Now;
                insertUsers_Messages.MessageType = "m";
                insertUsers_Messages.Details = "";
                insertUsers_Messages.ListFileUrl = "";
                insertUsers_Messages.Hidden = false;

                return insertUsers_Messages.SaveChanges();


                //var list = "";
                //var resp = Request.CreateResponse<RegisterResponseModel>(
                //HttpStatusCode.OK,
                //new RegisterResponseModel()
                //{
                //    status = true,
                //    data = list,
                //    error_message = ""
                //}
                //);
                //return resp;
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