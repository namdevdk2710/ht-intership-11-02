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
    public class Styles_Define_TextShowController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/GetStyles_Define_TextShow
        [HttpGet]
        [Route("api/GetStyles_Define_TextShow")]
        public HttpResponseMessage GetStyles_Define_TextShow()
        {
            try
            {
                var list =
                (
                    from m in db.Styles_Define_TextShow
                    where 
                    (
                        m.TextShowKey == "users.myaccoun" ||
                        m.TextShowKey == "users.message" ||
                        m.TextShowKey == "users.mailbox" ||
                        m.TextShowKey == "users.notification" ||
                        m.TextShowKey == "users.add_spend_money" ||
                        m.TextShowKey == "users.purchaseapplication" ||
                        m.TextShowKey == "users.list_posts_agent" ||    
                        m.TextShowKey == "users.openbooth" ||
                        m.TextShowKey == "users.log_out"
                    )
                    select new
                    {
                        MenuLeft = m
                    }
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