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
    [APIAPPAuthorizeAttribute]
    public class Styles_Users_CustomCategoriesController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/GetStyles_Users_CustomCategories/{idStore}
        [HttpGet]
        [Route("api/GetStyles_Users_CustomCategories/{idStore}")]
        public HttpResponseMessage GetStyles_Users_CustomCategories(int idStore)
        {
            try
            {
                var list = db.Styles_Users_CustomCategories.Where(d => d.ID_User == idStore && d.Active == true).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    });
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

        public class Styles_Shops_Products_Template_CustomCategories
        {
            public int ID_Product { get; set; }
            public string LinkSEOCatalog { get; set; }
            public string Link_SEO { get; set; }
            public Nullable<int> HitsTotal { get; set; }
            public string ProductName { get; set; }
            public string Image { get; set; }
            public string PriceType { get; set; }
            public Nullable<double> ProductPrice { get; set; }
            public Nullable<double> ProductDiscounts { get; set; }
            public Nullable<int> MinOfQuantity { get; set; }
            public string UnitName { get; set; }
            public string CurrencyCode { get; set; }
            public Nullable<bool> ServiceOrProduct { get; set; }
            public string UserName { get; set; }
            public Nullable<int> TotalLike { get; set; }
        }

        //Danh sách sản phẩm thuộc danh mục custom của gian hàng
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_By_CustomCategories/{lang}/{idStore}/{idCate}")]
        public HttpResponseMessage GetStyles_Shops_Products_By_CustomCategories(string lang, int idStore, int idCate)
        {
            try
            {
                var list = db.Database.SqlQuery<Styles_Shops_Products_Template_CustomCategories>(@"[dbo].[st_AUC_List_Products_By_IDCustomCategory_IDStore] 
                  @LanguageCode,@Catalogs,@ID_Store,@FeatureHash,@BrandHash,@StrSearch,@Min,@Max",
                 new SqlParameter("LanguageCode", lang),
                 new SqlParameter("Catalogs", idCate.ToString()),
                 new SqlParameter("ID_Store", idStore.ToString()),
                 new SqlParameter("FeatureHash", "-1"),
                 new SqlParameter("BrandHash", "-1"),
                 new SqlParameter("StrSearch", ""),
                 new SqlParameter("Min", "0"),
                 new SqlParameter("Max", "0")
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
