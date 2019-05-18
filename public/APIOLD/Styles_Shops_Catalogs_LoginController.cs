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
    public class Styles_Shops_Catalogs_LoginController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/GetStyles_Shops_Catalogs_Login
        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs_Login")]
        public HttpResponseMessage GetStyles_Shops_Catalogs_Login()
        {
            try
            {
                var list = db.Styles_Shops_Catalogs.Where(d => d.ID_Parent == 0).ToList();
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