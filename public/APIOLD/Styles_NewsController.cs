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
        [Route("api/GetStyles_News_Category/{idCate}/{lang}")]
        public HttpResponseMessage GetStyles_News_Category(int idCate,string lang)
        {
            try
            {
                //var list = db.Styles_News.Where(e => e.ID_Cate == idCate).OrderByDescending(o => o.Weight).ToList();
                var list = db.Database.SqlQuery<News>(@"select Styles_News.ID_News,Styles_News_Translation.Link_SEO,Image,Title,Styles_News.AddTime,
        Styles_News_Category_Translation.CategoryName,Styles_News_Category_Translation.Link_SEO as LinkSEOCate 
        from Styles_News,Styles_News_Translation,Styles_News_Category_Translation where Styles_News_Category_Translation.ID_Cate=Styles_News.ID_Cate 
        and Styles_News_Category_Translation.LanguageCode='" + lang + @"' and Styles_News.ID_Cate in (Select ID_Cate from Styles_News_Category 
        where Styles_News_Category.ID_Cate=" + idCate + " or Styles_News_Category.ID_Parent=" + idCate + @") 
        and Styles_News.Active = 1 and Styles_News.ID_News = Styles_News_Translation.ID_News and Styles_News_Translation.LanguageCode = '"+ lang + @"' ").ToList();
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

    public class News
    {
        public string Link_SEO { get; set; }
        public string LinkSEOCate { get; set; }
        public string Title { get; set; }
        public int ID_News { get; set; }
        public string Image { get; set; }
        public Nullable<System.DateTime> AddTime { get; set; }
    }
}