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
    [APIAPPAuthorizeAttribute]
    public class Styles_Banners_SlidesController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/GetStyles_Banners_Slides
        [HttpGet]
        [Route("api/GetStyles_Banners_Slides")]
        public HttpResponseMessage GetStyles_Banners_Slides()
        {
            try
            {
                var list = db.Styles_Banners_Slides.Where(d => d.Active == true).ToList();
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