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
    public class Styles_Shops_Catalogs_LoginController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        //Danh mục sản phẩm 
        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs_Menu_Login/{top}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Catalogs_Menu_Login(int top, string lang)
        {
            try
            {
                //var list = db.Database.SqlQuery<Styles_Shops_Catalogs_Menu>(@"[dbo].[st_AUC_List_Catalogs_Menu_TopN] 
                //    @LanguageCode,@TopN",new SqlParameter("LanguageCode", lang),new SqlParameter("TopN", top)).ToList();

                var list = db.Database.SqlQuery<Styles_Shops_Catalogs_Menu>(@"[dbo].[st_AUC_List_Catalogs_Menu_TopN] 
                    @LanguageCode,                     
                    @TopN",
                  new SqlParameter("LanguageCode", lang),
                  new SqlParameter("TopN", top)
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
        //Danh mục con sản phẩm

        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs_Fixed_Login/{idCatalog}/{top}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Catalogs_Fixed_Login(int idCatalog, int top, string lang)
        {
            try
            {
                var list =
              (
                  from c in db.Styles_Shops_Catalogs
                  join cT in db.Styles_Shops_Catalogs_Translation on c.ID_Catalog equals cT.ID_Catalog
                  where c.ID_Parent == idCatalog && c.Active == true && cT.LanguageCode == lang
                  orderby c.Weight
                  select new
                  {
                      ID_Catalog = c.ID_Catalog,
                      Link_SEO = cT.Link_SEO,
                      ImagePromo = c.ImagePromo,
                      CatalogName = cT.CatalogName
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



        // GET: api/GetStyles_Shops_Catalogs_Login
        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs_Login/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Catalogs_Login(string lang)
        {
            try
            {
                //var list = db.Styles_Shops_Catalogs.Where(d => d.ID_Parent == 0).ToList();
                var list =
                  (
                      from c in db.Styles_Shops_Catalogs
                      join cT in db.Styles_Shops_Catalogs_Translation on c.ID_Catalog equals cT.ID_Catalog
                      where c.ID_Parent == 0 && c.Active == true && cT.LanguageCode == lang
                      select new
                      {
                          ID_Catalog = c.ID_Catalog,
                          CatalogName = cT.CatalogName
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
        [HttpGet]
        [Route("api/GetStyles_Shops_Catalogs_Login/{idCatalog}/{top}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Catalogs_Login(int idCatalog, int top, string lang)
        {
            try
            {
                var list =
                  (
                      from c in db.Styles_Shops_Catalogs
                      join cT in db.Styles_Shops_Catalogs_Translation on c.ID_Catalog equals cT.ID_Catalog
                      where c.ID_Parent == idCatalog && c.Active == true && cT.LanguageCode == lang
                      select new
                      {
                          ID_Catalog = c.ID_Catalog,
                          CatalogName = cT.CatalogName
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