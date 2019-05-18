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
    public class Styles_NewsController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_News
        [HttpGet]
        [Route("api/GetStyles_News_Category")]
        public HttpResponseMessage GetStyles_News_Category()
        {
            try
            {
                var list = db.Styles_News_Category.Where(d => d.ID_Parent == 0).ToList();
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

        // GET: api/GetStyles_News_Category
        [HttpGet]
        [Route("api/GetStyles_News_Category/{idCate}")]
        public HttpResponseMessage GetStyles_News_Category(int idCate)
        {
            try
            {
                var list = db.Styles_News.Where(e => e.ID_Cate == idCate).OrderByDescending(o => o.Weight).ToList();
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

        // GET: api/GetStyles_News/Detail/{idNews}
        [HttpGet]
        [Route("api/GetStyles_News/Detail/{idNews}")]
        public HttpResponseMessage GetStyles_News(int idNews)
        {
            try
            {
                var list = db.Styles_News.Where(e => e.ID_News == idNews).ToList();
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